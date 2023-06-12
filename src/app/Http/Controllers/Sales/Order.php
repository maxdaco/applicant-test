<?php

namespace App\Http\Controllers\Sales;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\OrderProduct;
use App\Models\User;


class Order extends Controller
{
    public function showOrderPage(Request $request)
    {
        $cartItems = Session::get('cart', []);

        $totalPrice = 0;

        foreach ($cartItems as $product) {
            $totalPrice += $product->price;
        }

        return view('order.order-confirmation',
        ['cartItems' => $cartItems,
        'totalPrice' => $totalPrice,]);

    }
    public function placeOrder(Request $request)
    {
        
        $order = new \App\Models\Order();
        $order->customer_id = User::first()->id;
        $order->price = $request->input('totalPrice');
        $order->delivery_address = $request->input('delivery_address');
        $order->save();
        // Save the items to the order_products table

        $cartItems = Session::get('cart', []);
        foreach ($cartItems as $item) {
        $orderProducts = new OrderProduct();
        $orderProducts->order_id = $order->id;
        $orderProducts->product_id = $item->id;
        $orderProducts->save();

    }
    Session::flush();
    return view('order.thanks')
    ->with('order', $order);
    
}

}