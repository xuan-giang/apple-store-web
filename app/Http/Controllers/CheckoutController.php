<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderList;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function searchProducts(){

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
        return view('checkout.index',data:['cart'=>$cart, 'products_in_cart'=>$products_in_cart]);
    }

    public function addOrder(request $request){
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
            $totalPrice = 0;
            foreach($products_in_cart as $product)
                $totalPrice += $product->price * $cart[$product->id];

            $order = new OrderList();
            $order->id;
            $order->username = Auth::user()->username;
            $order->fullname = $request->fullname;
            $order->address = $request->address;
            $order->phone_number = $request->phone;
            $order->total_price = $totalPrice;
            $order->email = Auth::user()->email;
            $order->note = $request->note;
            $order->payment_method = $request->paymentMethod;

            $order->save();

            foreach($products_in_cart as $product)
            {
                $orderDetail = new OrderDetail();
                $orderDetail->id_order = $order->id;
                $orderDetail->id_product = $product->id;
                $orderDetail->price = $product->price;
                $orderDetail->qty = $cart[$product->id];

                $orderDetail->save();

                $data = Product::find($product->id);
                $data->quantity = $data->quantity - $cart[$product->id];
                $data->sold += $cart[$product->id];
                $data->save();

            }
            echo '<script language="javascript">alert("Mua hàng thành công !!!");</script>';

            if(!empty($_SESSION['cart'])){
                unset( $_SESSION['cart']);
            }

            return redirect()->route('home');
    }

    public function updateProduct(){
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


    }
}
