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

        if(!isset($_SESSION))
        {
            session_start();
        }
       // session_destroy();
        $id = $request->input('id');
        if($id !== null){
            if(empty($_SESSION['cart'])){
                $_SESSION['cart'][$id] = 1;
            }elseif(!empty($_SESSION['cart'][$id])){
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
            if($product !== null && $quantity >0){
                $total += $product->price * $quantity;
            }
        }
        return $total;
        //echo $total;
        //return view('cart.index');
       // header('location:shop');
       // return redirect()->route('shop');
    }




    public function update_to_cart(Request $request)
    {

        if(!isset($_SESSION))
        {
            session_start();
        }
        $id = $_GET['id'];
        $type = $_GET['type'];
        if($type === 'decre'){
            if($_SESSION['cart'][$id] > 1){
                $_SESSION['cart'][$id]--;
            }else{
                unset($_SESSION['cart'][$id]);
            }
        }else{
            $_SESSION['cart'][$id]++;
        }


        // tính giỏ hàng

        $cart = [];
        if(!empty($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }
        $total = 0;
        foreach ($cart as $id => $quantity){
            $product = Product::query()->where('id', $id)->first();
            if($product !== null && $quantity >0){
                $total += $product->price * $quantity;
            }
        }
        return $total;
        echo $total;

        //return view('cart.index');
        // header('location:shop');
        //return redirect()->route('shop');
    }

    public function remove_to_cart(Request $request)
    {

        if(!isset($_SESSION))
        {
            session_start();
        }
        $id = $_GET['id'];

        if($_SESSION['cart'][$id] > 0){
            unset($_SESSION['cart'][$id]);
        }


        // tính giỏ hàng

        $cart = [];
        if(!empty($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }
        $total = 0;
        foreach ($cart as $id => $quantity){
            $product = Product::query()->where('id', $id)->first();
            if($product !== null && $quantity >0){
                $total += $product->price * $quantity;
            }
        }
        return $total;
        echo $total;

        //return view('cart.index');
        // header('location:shop');
        //return redirect()->route('shop');
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
