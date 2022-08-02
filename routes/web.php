<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ShopController;
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

Route::get('/',
    action : [HomeController::class,'index']
)->name('home');


Route::get('/shop',
    action : [ShopController::class,'index'])->name('shop');

Route::get('/details',
    action : [ProductDetailsController::class,'index'])->name('details');


// Cart controller
Route::get('/cart',
    action : [CartController::class,'index'])->name('cart');

Route::get('/add-to-cart',
    action : [CartController::class,'add_to_cart'])->name('add_to_cart');

Route::get('/update-to-cart',
    action : [CartController::class,'update_to_cart'])->name('update_to_cart');

Route::get('/remove_to_cart',
    action : [CartController::class,'remove_to_cart'])->name('remove_to_cart');
