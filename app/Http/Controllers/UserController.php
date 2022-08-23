<?php

namespace App\Http\Controllers;

use App\Models\OrderList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {
        $user_name = Auth::user()->username;
        $user =DB::table("user")->where('username', '=', $user_name)->first();

        $total_bill = OrderList::query()->where("username", '=', $user_name)->count();
        $total_money = OrderList::query()->where("username", '=', $user_name)->sum('total_price');

        $total_bill_pending = OrderList::query()->where("username",$user_name)->where("status","=",1 )->count();
        $total_bill_delivery = OrderList::query()->where("username",$user_name)->where("status","=",2 )->count();

        return view('user.index', data:[
           'user'=>$user,
            'total_bill'=>$total_bill,
            'total_money'=>$total_money,
            'total_bill_pending'=>$total_bill_pending,
            'total_bill_delivery'=>$total_bill_delivery
        ]);
    }

    public function update(Request $request)
    {
        $user_name = Auth::user()->username;
        if($request->has("fullname") && $user_name !== null){
            $user_full_name = $request->input("fullname");
            User::query()->where("username", '=',  $user_name)->update(['fullname'=> $user_full_name]);
        }

        return redirect()->route("user-detail");
    }
}
