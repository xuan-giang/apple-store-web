<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {


        $categories = DB::table('product_category')->get();
        $products = Product::query();
        $category_selected = null;

        $total_product = Product::query()->count();

        if ($request->has('category')) {
            $category_selected = $request->input('category');
            $name_category = DB::table('product_category')->where('name', 'like', $category_selected)->first();

            $products->where('type','=',$name_category->id);
        }


        $price_min_selected = null;
        $price_max_selected = null;
        $price_max = null;
        $price_min = null;
        if($request->has('price_max') && $request->has('price_min')){

            $price_min = $request->input('price_min');
            $price_min_selected = $price_min;
            $price_max = $request->input('price_max');
            $price_max_selected = $price_max;
            $products->whereBetween('price',[$price_min,$price_max]);
        }

        $tag_selected = null;
        if($request->has('tag')){
            $tag_selected = $request->input('tag');
            $products->where('product.name', 'like','%'.$tag_selected.'%');
        }

        $search = $request['search'] ?? "";
        if($search != ""){
            $products->where('name' ,'like',"%$search%")->get();
        }

        $products = $products->paginate(6);

        $products->appends([
            'category' => $category_selected,
            'price_max' => $price_max,
            'price_min' => $price_min,
            'tag' => $tag_selected,
            'search' => $search,
        ]);


        // list price
        $max_price = Product::query()
            ->where('quantity','>',0)
            ->where('status','=',1)
            ->orderBy('price','desc')
            ->get()
            ->first();
        $level_price = [];
        for($i=0; $i<(int)$max_price->price ;$i+=500)
            $level_price[] = $i;



//        $params = array_merge([
//            'category' => $category_selected,
//            'price_max' => $price_max,
//            'price_min' => $price_min,
//            'tags' => $tags
//        ]);
//
//        $new_query_string = http_build_query( $params );

        // search


        return view("shop.index",data :[
            'categories' => $categories,
            'products' => $products,
            'level_price' => $level_price,
            'category_selected' => $category_selected,
            'price_min_selected' => $price_min_selected,
            'price_max_selected' => $price_max_selected,
            'tag_selected' =>$tag_selected,
            'total_product'=>$total_product
        ]);



    }
    public function view(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $product1 = Product::where('name' ,'LIKE',"%$search%")->get();
        }
        else{
            $product1 = Product::all();
        }
        $data = compact('product1');
        return view('shop.index') ->with($data);
    }
}
