<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\OderMail;
use App\Mail\OderMailCompleteAdmin;
use App\Mail\OderMailConfirmAdmin;
use App\Models\OrderDetail;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductInformation;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class BillManagerController extends Controller
{
    function index()
    {
        $order_list = OrderList::query()->orderBy('created_at','desc')->get();
        return view('admin.bill.bill',data:[
            'order_list' => $order_list
        ]);
    }

    // Generate PDF
    public function createPDF(Request $request) {
        if($request->has('id'))
        {
            $id = $request->input('id');
            $bill = OrderList::query()->where('id_order',$id)->first();
            $str ="SELECT * FROM order_detail INNER JOIN product ON  product.id = id_product where id_order =$id";
            $list_products = DB::SELECT($str);

            view()->share('bill',$bill);
            view()->share('list_products',$list_products);
            $pdf = PDF::loadView('admin.bill.bill_detail_pdf', $bill->toArray())->setOptions(['defaultFont' => 'sans-serif']);

            $fileName = "Bill-".$bill->id_order."_".$bill->created_at;
            return $pdf->download($fileName.'.pdf');
        }else{
            return redirect()->route('admin-bill');
        }
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

            return view('admin.bill.bill_detail',data:[
                'bill'=> $bill,
                'list_products'=>$list_products
            ]);
        }else{
            return redirect()->route('admin-bill');
        }

    }

    function update_status(Request $request)
    {
        if($request->has('id') && $request->has('status') ) {
            $id = $request->input('id');
            $status = (int)$request->input('status');
            $order = OrderList::where('id_order','=',$id)->first();
            $str ="SELECT * FROM order_detail INNER JOIN product ON  product.id = id_product where id_order = ".$order->id_order;
            $list_products = DB::SELECT($str);
            if($status === 1){  // neu bill đang chờ -> thành xác nhận
                $status = 2;

                $this->sendOrderConfirmationEmail($order, $list_products);
            }else if($status === 2){ // bill đã xác nhận -> thành hoàn thành
                $status = 3;
                $this->sendOrderCompleteEmail($order, $list_products);
            }
            OrderList::where('id_order',$id)->update(['status' =>$status]);
        }
        return redirect()->route('admin-bill');
    }

    public function sendOrderConfirmationEmail($order, $products_in_cart){

        Mail::to($order->email)->send(new OderMailConfirmAdmin($order, $products_in_cart));
    }
    public function sendOrderCompleteEmail($order, $products_in_cart){

        Mail::to($order->email)->send(new OderMailCompleteAdmin($order, $products_in_cart));
    }
}
