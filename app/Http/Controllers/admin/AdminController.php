<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function view;

class AdminController extends Controller
{
    //

    function index()
    {
        if(Auth::check() && Auth::user()->lv == 1){
            $number_bill_pending = OrderList::query()->where('status','=',2)->count();
            $number_user = User::query()->count();
            $number_product = Product::query()->count();
            return view('admin.index',data:[
                'number_bill_pending' => $number_bill_pending,
                'number_user' => $number_user,
                'number_product' => $number_product
            ]);
        } else{
            return view('admin.login.index');
        }
    }


    function customer()
    {
        $users = User::query()->get();
        return view('admin.customer',data:[
            'users' => $users
        ]);
    }


    function product()
    {
        $products = Product::query()->get();
        return view('admin.product.product',data:[
            'products' => $products
        ]);
    }

    function product_add()
    {
        //$products = Product::query()->get();
        return view('admin.product.product_add',data:[
           // 'products' => $products
        ]);
    }
}
