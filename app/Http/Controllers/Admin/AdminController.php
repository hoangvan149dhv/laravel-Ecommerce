<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\AbstractController;
use Auth;

abstract class AdminController extends AbstractController
{
    /**
     * Current signed user
     * @var $user
     */
    protected $user;

    protected $guard;

    protected $model;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            view()->share('user', $this->user);
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (!is_numeric($page = $request->page)) {
            $page = 1;
        }

        $items = $this->model->paginate(5, ['*'], 'page', $page);

        $items->map(function ($item) {
            $item->link = route($this->model->get('view')['show'], $item);
        });

        return $request->get_jsons ? response()->json($items)
            : view($this->model->get('view')['index'], compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->model->get('view')['create'], ['data' => $this->model]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $data = $this->model->findOrFail($id);
        $data->getImage($data);

        return view($this->model->get('view')['show'], compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$data = $this->model->create($request->only($this->model->getFillable()))) {
            // Upload Image
            return response('Không thể lưu được, vui lòng thử lại sau', 500);
        }

        $data->uploadMedia();

        return response(['smg' => 'Lưu thành công', 'id' => $data->id], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$data = $this->model->findOrFail($id)) {
            return response([], 500);
        }

        $data->removeImage($data);

        if (!$data->update($request->only($this->model->getFillable()))) {
            // Upload Image
            return response('Không thể lưu được, vui lòng thử lại sau', 500);
        }

        $data->uploadMedia();

        return response(['smg' => 'Lưu thành công', 'id' => $data->id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$data = $this->model->findOrFail($id)) {
            return response([], 500);
        }
        $data->delete();
        $data->removeImage($data);
        return response('Xóa thành công', 200);
    }
}
