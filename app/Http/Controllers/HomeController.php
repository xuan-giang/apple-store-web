<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\home;
use App\Http\Requests\StorehomeRequest;
use App\Http\Requests\UpdatehomeRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        //query banner

        $images_banner = Banner::query()->get();

        //query Top 3 best selling products
        $images_top_3_best_sell = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->orderBy('sold','desc')
            ->limit(3)
            ->get();

        // query Bestsaler
        $product_best_sell = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->orderBy('sold','desc')
            ->limit(5)
            ->get();
        $product_new_arrivals  = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();

        $product_hot_sales = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->orderBy('updated_at','desc')
            ->limit(6)
            ->get();

        $product_sell_time = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->get()
            ->first();
        $product_price_max = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->orderBy('price','desc')
            ->limit(6)
            ->get();

        return view("index",data: [
            'images_banner' => $images_banner,
            'images_top_3_best_sell' => $images_top_3_best_sell,
            'product_best_sell' => $product_best_sell,
            'product_sell_time' => $product_sell_time,
            'product_price_max' => $product_price_max,
            'product_new_arrivals' => $product_new_arrivals,
            'product_hot_sales' => $product_hot_sales,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StorehomeRequest $request)
    {
        //
    }


    public function show(home $home)
    {
        //
    }


    public function edit(home $home)
    {
        //
    }


    public function update(UpdatehomeRequest $request, home $home)
    {
        //
    }


    public function destroy(home $home)
    {
        //
    }
}
