<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends AdminController
{
    public function __construct(Category $category)
    {
        $this->model = $category;
        parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$category = $this->model->create($request->only(['name', 'desc']))) {
            // Upload Image
            return response('Không thể lưu được, vui lòng thử lại sau', 500);
        }

        $category->uploadImage($request);

        return response(['smg' => 'Lưu thành công', 'id' => $category->id], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if (!empty($img = $category->getFirstMedia('category'))) {
            $imageUrl = $img->getFullUrl();
            $category->image = $img;
            $category->image->url = $imageUrl;
        }

        return view('admin.category.show', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (count($category->media)) {
            foreach ($category->getMedia('category') as $media) {
                //Remove old img
                if (!empty($request->imageName) && $request->imageName !== $media->file_name) {
                    $media->delete();
                }
            }
        }

        if(!$category->update($request->only(['name', 'desc']))) {
            // Upload Image
            return response('Không thể lưu được, vui lòng thử lại sau', 500);
        }

        $category->uploadImage($request);

        return response(['smg' => 'Lưu thành công', 'id' => $category->id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $categor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!$category->delete()) {
            return response([], 500);
        }

        // Delete media
        foreach ($category->media as $media) {
            $media->delete();
        }

        return response('Xóa thành công', 200);
    }
}
