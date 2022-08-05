<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function Sodium\add;

class CartController extends Controller
{



    //
    public function add_to_cart(Request $request)
    {

        // Khởi tạo session
        if(!isset($_SESSION))
        {
            session_start();
        }
       // session_destroy();
        $id = $request->input('id');
        if($id !== null){
            if(empty($_SESSION['cart'])){  // khởi tạo số lượng lần thêm đầu tiên
                $_SESSION['cart'][$id] = 1;
            }elseif(!empty($_SESSION['cart'][$id])){ // Tăng số lượng thêm
                $_SESSION['cart'][$id]++;
            }else{
                $_SESSION['cart'][$id] =1;
            }
        }

        // tính giỏ hàng

        $cart = [];
        if(!empty($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }
        $total = 0;
        foreach ($cart as $id => $quantity){
            $product = Product::query()->where('id', $id)->first();
            if($product !== null || $quantity >0){
                $total += $product->price * $quantity;
            }
        }
        return $total;
        echo $total;
        //return view('cart.index');
       // header('location:shop');
       // return redirect()->route('shop');
    }





    public function index(){
        if(!isset($_SESSION))
        {
            session_start();
        }
        $cart = [];
        if(!empty($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }
        $products_in_cart = [];
        foreach ($cart as $id => $quantity){
            $product = Product::query()->where('id', $id)->first();
            if($product !== null){
                $products_in_cart[] = $product;
            }
        }

        return view('cart.index',data:['cart'=>$cart, 'products_in_cart'=>$products_in_cart]);
    }
}
