<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderList;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;
use Illuminate\Support\Facades\DB;

// xem hóa đơn đã đặt
class OrderController extends Controller
{
    public function index(Request $request){

        $userId = Auth::user()->username;

        $orderMore=[];

        $type_request = 1;
        if($request->has("type_bill"))
            $type_request = $request->input('type_bill');

       // dd($orderUser);
        $orderUser = DB::table("order_list")->where("username",$userId)->where("status","=",$type_request )->orderBy("updated_at",'desc')->get();

        foreach($orderUser as $orders){
            $order_id = $orders->id_order;

            $orderDetail = DB::table("order_detail")
            ->join('product', 'order_detail.id_product', '=', 'product.id')
            ->where("id_order",$order_id)->get();
            $orderMore[] = $orderDetail;
        }


        return view('order.index',data:[
            'order'=>$orderUser,
            'orderDetail'=>$orderMore,
            'type_request' =>$type_request
        ]);


    }

    function view(Request $request)
    {
        if($request->has('id'))
        {
            $id = $request->input('id');
            $bill = OrderList::query()->where('id_order',$id)->first();
            $str ="SELECT * FROM order_detail INNER JOIN product ON  product.id = id_product where id_order =$id";
            // $list_bill = OrderDetail::query()->where('id_order',$id)->get();
            $list_products = DB::SELECT($str);

            return view('order.detail',data:[
                'bill'=> $bill,
                'list_products'=>$list_products
            ]);
        }else{
            return redirect()->route('admin-bill');
        }

    }

    function destroy(Request $request)
    {
        if($request->has('id')) {
            $id = $request->input('id');
            OrderList::where('id_order',$id)->update(['status' =>0]);
        }
        return redirect()->route('order-list');
    }
}
