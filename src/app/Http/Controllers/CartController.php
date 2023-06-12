<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart() {


        // Retrieve the cart items from the session
        $cartItems = Session::get('cart', []);

        $totalPrice = 0;

        foreach ($cartItems as $product) {
            $totalPrice += $product->price;
        }

        // Pass the cart items to the view
        return view('order.cart', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function addProduct(Request $request) {
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);

    // Get the current cart items from the session
        $cartItems = Session::get('cart', []);

    // Add the product to the cart
    $cartItems[] = $product;

    // Update the cart in the session
        Session::put('cart', $cartItems);

    return redirect()->back()->with('success', 'Product added to cart.');

    }
    public function removeProduct(Request $request) {
        $product_id = $request->input('product_id');
      
        // Get the current cart items from the session
        $cartItems = Session::get('cart', []);
    
        // Find the index of the product in the cart
        $index = array_search($product_id, array_column($cartItems, 'id'));
    
        // Remove the product from the cart if found
        if ($index !== false) {
            array_splice($cartItems, $index, 1);
        }
    
        // Update the cart in the session
        Session::put('cart', $cartItems);
    
        return redirect()->back()->with('success', 'Product removed from cart.');
    }
    


}
