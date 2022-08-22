<?php

namespace App\Http\Controllers;

use App\Mail\OderMail;
use App\Models\Product;
use App\Models\OrderList;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $str ="SELECT * FROM order_detail INNER JOIN product ON  product.id = id_product where id_order = ".$order->id;
        $list_products = DB::SELECT($str);
            $this->sendOrderConfirmationEmail($order, $list_products);
            return redirect()->route('home');
    }

    public function sendOrderConfirmationEmail($order, $products_in_cart){
        Mail::to($order->email)->send(new OderMail($order, $products_in_cart));
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
