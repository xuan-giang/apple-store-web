<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BillManagerController;
use App\Http\Controllers\admin\CategoryManagerController;
use App\Http\Controllers\admin\ProductManagerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactsController;
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

Route::get('/admin',
    action : [AdminController::class,'index'])->name('admin');

Route::get('/admin-customer',
    action : [AdminController::class,'customer'])->name('customer');

Route::get('/logout-admin',
    action : [LoginController::class,'getLogoutAdmin'])->name('logout-admin');

// Product manager

Route::get('/admin-product',
    action : [ProductManagerController::class,'index'])->name('admin-product');

Route::get('/admin-product-create',
    action : [ProductManagerController::class,'create'])->name('admin-product-create');

Route::post('/admin-product-store',
    action : [ProductManagerController::class,'store'])->name('admin-product-store');

Route::get('/admin-product-delete',
    action : [ProductManagerController::class,'delete'])->name('admin-product-delete');

Route::get('/admin-product-update',
    action : [ProductManagerController::class,'update'])->name('admin-product-update');

Route::get('/admin-product-edit',
    action : [ProductManagerController::class,'edit'])->name('admin-product-edit');

//login admin
Route::get('/log-admin',
    action : [LoginController::class,'getLogAdmin'])->name('logAdmin');

Route::post('/post-log-admin',
    action : [LoginController::class,'postLogAdmin'])->name('postlogAdmin');

// Bill
Route::get('/admin-bill',
    action : [BillManagerController::class,'index'])->name('admin-bill');
Route::get('/admin-detail-bill',
    action : [BillManagerController::class,'view'])->name('admin-detail-bill');

Route::get('/admin-update-status-bill',
    action : [BillManagerController::class,'update_status'])->name('admin-update-status-bill');

Route::get('/details',
    action : [ProductDetailsController::class,'index'])->name('details');

Route::get('/contacts',
    action : [ContactsController::class,'index'])->name('contacts');

Route::get('/bill-details/pdf', [BillManagerController::class, 'createPDF'])->name('admin-export-bill');
//Login

Route::get('/login',
    action : [LoginController::class,'getLogin']
)->name('login');

Route::get('/register',
    action : [LoginController::class,'showRegister']
);

Route::post('/register',
    action : [LoginController::class,'register']
)->name('register');

Route::post('/login',
    action : [LoginController::class,'postLogin']
)->name('postLogin');

Route::get('/logout',
    action : [LoginController::class,'getLogout'])->name('logout');


//cart order controller
Route::get('/checkout',
    action : [CheckoutController::class,'index'])->name('checkout');

Route::post('/order',
    action : [CheckoutController::class,'addOrder'])->name('addOrder');

// Category manager

Route::get('/admin-category',
    action : [CategoryManagerController::class,'index'])->name('admin-category');

Route::get('/admin-category-create',
    action : [CategoryManagerController::class,'create'])->name('admin-category-create');

Route::post('/admin-category-store',
    action : [CategoryManagerController::class,'store'])->name('admin-category-store');

Route::get('/admin-category-delete',
    action : [CategoryManagerController::class,'delete'])->name('admin-category-delete');

Route::post('/admin-category-update',
    action : [CategoryManagerController::class,'update'])->name('admin-category-update');

Route::get('/admin-category-edit',
    action : [CategoryManagerController::class,'edit'])->name('admin-category-edit');


//order list
Route::get('/order',
    action : [OrderController::class,'index'])->name('order-list');

Route::get('/order-bill-detail',
    action : [OrderController::class,'view'])->name('order-bill-detail');

Route::get('/order-bill-destroy',
    action : [OrderController::class,'destroy'])->name('order-bill-destroy');


// user detail
Route::get('/user-detail',
    action : [\App\Http\Controllers\UserController::class,'index'])->name('user-detail');

Route::get('/user-update',
    action : [\App\Http\Controllers\UserController::class,'update'])->name('user-update');
