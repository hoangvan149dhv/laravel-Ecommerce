<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends ClientController
{
    public function addToCart(Request $request)
    {
        $product = Product::Select(['id', 'name', 'price'])
            ->findOrFail($request->only('id'))
            ->first();
        $product->getImage($product);
        $proImg = $product->image->url ?? asset('image/no-image.png');

        Cart::add(array_merge($product->toArray(),
            ["weight" => 0],
            ["qty" => 1],
            ['options' => ['image' => $proImg]]));

        return response()->json(['items' => Cart::count()]);
    }

    public function index()
    {
        return view('client.cart.index');
    }

    public function update(Request $request)
    {
        $data = collect($request->all());
        $data->map(function ($item){
            cart('update',[$item['rowId'], $item['qty']]);
        });

        return response()->json(
            ['data' => cart(),
                'subtotal' => cart('total', [0,',','.']),
                'qty' => cart('count')
            ]);
    }
}
