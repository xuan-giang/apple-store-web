<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function index(Request $request)
    {
        if($request->has("id")){
            $id=$request->input("id");
            $product = Product::query()
            ->where('id','=',$id)
            ->first();
            
            $products_related = Product::query()
                ->where('type','=',$product->type)
                ->where('id','!=',$id)
                ->limit(4)
                ->get();
            
            $product_inf = DB::table('product_information')
                ->where('id_product','=',$id)
                ->first();
            $products_img = ProductImages::query()
            ->where('id_product','=',$id)
            ->get();
            }

        return view("details.index",data: [
            "product" => $product,
            "products_related" => $products_related,
            "product_inf"=> $product_inf,
             "products_img"=> $products_img
        ]);


    }


    }
