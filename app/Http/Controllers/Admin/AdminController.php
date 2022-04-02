<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            $this->guard = \Illuminate\Support\Facades\Auth::guard();
            view()->share('user', $this->user);
            return $next($request);
        });
    }

    public function index(Request $request) {
        if (!is_numeric($page = $request->page)) {
            $page = 1;
        }

        $items = $this->model->paginate(10, ['*'], 'page', $page);

        $items->map(function ($item) {
            $item->link = route($this->model->view['show'], $item);
        });

        return $request->get_jsons ? response()->json($items)
            : view($this->model->view['index'], compact('items'));
    }
}
