<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;

class ProductController extends AdminController
{
    public function __construct(Product $product)
    {
        $this->model = $product;
        parent::__construct();
    }
}
