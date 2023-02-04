<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
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

Route::get('/index', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/wishlist/{id}/add', [WishListController::class, 'store']);

Route::delete('/wishlist/{id}', [WishListController::class, 'destroy']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/cart/{id}/add', [CartController::class, 'add']);

Route::post('/cart/coupon/apply', [CartController::class, 'apply_coupon']);

Route::post('/cart/coupon/unapply', [CartController::class, 'unapply_coupon']);

Route::get('/cart/{id}/edit', [CartController::class, 'edit']);

Route::put('/cart/{product}', [CartController::class, 'update']);

Route::get('/cart/{id}/clear', [CartController::class, 'clear']);

Route::post('/place-order', [CartController::class, 'place_order']);

Route::post('/calculate/shipping_fee', [CartController::class, 'calculate_shipping_fee']);

Route::get('/order-message', [CartController::class, 'message']);

Route::post('/address/add', [UserController::class, 'add_address']);

Route::post('/shipping-info/add', [CartController::class, 'add_shipping_address']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/register', [UserController::class, 'store']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);