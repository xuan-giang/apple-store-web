@extends('menu')
@section('content')

    <style>
        body {
            background: rgb(201, 201, 201)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #b4b4b4
        }

        .profile-button {
            background: rgb(176, 174, 176);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #817e81
        }

        .profile-button:focus {
            background: #7f7f80;
            box-shadow: none
        }

        .profile-button:active {
            background: #818181;
            box-shadow: none
        }

        .back:hover {
            color: #6a696b;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #c3c3c9;
            color: #fff;
            cursor: pointer;
            border: solid 1px #939293
        }
    </style>

    <div style="margin-top: 200px"></div>
   <form action="{{route("user-update")}}" method="get">
       <div class="container rounded bg-white mt-5 mb-5" >
           <div class="row">
               <div class="col-md-3 border-right">
                   <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$user->fullname}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
               </div>
               <div class="col-md-5 border-right">
                   <div class="p-3 py-5">
                       <div class="d-flex justify-content-between align-items-center mb-3">
                           <h4 class="text-right">Xin chào {{$user->fullname}}</h4>
                       </div>
                       <div class="row mt-2">
                           <div class="col-md-6"><label class="labels">Tên đăng nhập</label><input name="username" type="text" class="form-control" placeholder="Họ và tên" disabled="disabled" readonly="readonly" value="{{$user->username}}"></div>
                           <div class="col-md-6"><label class="labels">Họ và tên</label><input name="fullname" type="text" class="form-control" value="{{$user->fullname}}" placeholder="Họ và tên"></div>
                       </div>
                       <div class="row mt-3">
                           <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" disabled="disabled" readonly="readonly" placeholder="email" value="{{$user->email}}"></div>

                       </div>
                       <div class="row mt-3">
                           <div class="col-md-6"><label class="labels">Số đơn hàng đặt</label><input type="text" class="form-control" disabled="disabled" readonly="readonly"  value="{{$total_bill}}"></div>
                           <div class="col-md-6"><label class="labels">Tổng tiền đã chi</label><input type="text" class="form-control" disabled="disabled" readonly="readonly" value="${{$total_money}}" ></div>
                       </div>
                       <div class="mt-5 text-center"><input class="btn btn-primary profile-button"  type="submit" value="Lưu thông tin" /></div>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="p-3 py-5">
                       <div class="d-flex justify-content-between align-items-center experience"><span>Thông tin về đặt hàng</span><span class="border px-3 p-1 add-experience"><i class="fa fa-list"></i><a href="{{route("order-list")}}"> Xem chi tiết</a></span></div><br>
                       <div class="col-md-12"><label class="labels">Đơn chờ xác nhận</label><input type="text" class="form-control" disabled="disabled" readonly="readonly" placeholder="experience" value="{{$total_bill_pending}}"></div> <br>
                       <div class="col-md-12"><label class="labels">Đơn đơn đang giao</label><input type="text" class="form-control" disabled="disabled" readonly="readonly" placeholder="additional details" value="{{$total_bill_delivery}}"></div>
                   </div>
               </div>
           </div>
       </div>
   </form>


@endsection
