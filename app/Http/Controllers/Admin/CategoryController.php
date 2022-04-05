<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;

class CategoryController extends AdminController
{
    public function __construct(Category $category)
    {
        $this->model = $category;
        parent::__construct();
    }
}
