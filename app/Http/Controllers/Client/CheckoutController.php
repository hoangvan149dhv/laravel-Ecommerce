<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends ClientController
{
    public function index()
    {
        return cart()->isnotEmpty() ? view('client.checkout.index') : redirect('/');
    }

    public function checkout(Request $request, Order $order)
    {
        $params = $request->all();
        $data['phone'] = $params['customer']['phone'];
        $data['status'] = self::UNPAID;
        $order = $order->create(array_merge($request->only(['customer','products']), $data));
//        cart('destroy');

        return response()->json($order->id);
    }
}
