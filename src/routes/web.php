<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Catalogue\Product::class, 'index']);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart']);
Route::get('/order-confirmation', [App\Http\Controllers\Sales\Order::class, 'showOrderPage']);
Route::post('/order-confirmation', [App\Http\Controllers\Sales\Order::class, 'placeOrder'])->name('order.placeOrder');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addProduct'])->name('cart.add');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'removeProduct'])->name('cart.remove');

