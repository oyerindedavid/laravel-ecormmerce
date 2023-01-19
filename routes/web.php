<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/cart', [CartController::class, 'index']);

Route::get('/cart/{id}/add', [CartController::class, 'add']);

Route::get('/cart/{id}/edit', [CartController::class, 'edit']);

Route::put('/cart/{product}', [CartController::class, 'update']);

Route::delete('/cart/{product}', [CartController::class, 'delete']);

Route::get('/cart/{id}/clear', [CartController::class, 'clear']);

Route::get('/cart/review', [CartController::class, 'review']);

Route::get('/order-message', [CartController::class, 'message']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/register', [UserController::class, 'store']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);