<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    public function index(Product $products) {
        $categories = $products->getCategories(4);
        $categories->map(function ($category) {
            $category->getImage($category);
        });

        $products = $products->getProducts(12);
        return view('client.home.index', compact('products','categories'));
    }
}
