@extends('menu')

@section('content')


<!-- Header Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Đơn đặt hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route("home")}}">Trang chủ</a>
                        <a href="{{route("cart")}}">Cửa hàng</a>
                        <span>Đơn đặt hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<style>
    a{
        color: grey;
    }
</style>
<section class="shopping-cart spad">
    <div class="row">
        <div class="col-lg-12">
            <ul class="filter__controls">
                <li  ><a @if($type_request === "1") style="color: blue!important;" @endif href="{{route("order-list", parameters:["type_bill" => 1])}}">Đơn chờ xác nhận</a> </li>
                <li  ><a @if($type_request === "2") style="color: blue!important;" @endif href="{{route("order-list", parameters:["type_bill" => 2])}}">Đơn đang giao</a> </li>
                <li  ><a @if($type_request === "3") style="color: blue!important;" @endif href="{{route("order-list", parameters:["type_bill" => 3])}}">Đơn đã nhận</a> </li>
                <li  ><a @if($type_request === "0") style="color: blue!important;" @endif href="{{route("order-list", parameters:["type_bill" => 0])}}">Đơn đã hủy</a> </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping__cart__table">

                    <table>
                        <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Hàng</th>
                            <th>Địa chỉ</th>
                            <th>Thời gian </th>
                            <th></th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                            \Carbon\Carbon::setLocale('vi');
                            ?>
                            @if(sizeof($order)>0)
                            @foreach($order as $orders)
                            <tr>
                                <td class="quantity__item" >
                                    <div class="quantity">
                                        <div class="row">
                                            <div style="margin-left:40px;" ><span class="span-quantity">{{$orders->id_order}}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                            @foreach($orderDetail[$i++] as $product)
                                                <h6>{{$product->name}}</h6>
                                            @endforeach
                                    </div>
                                </td>
                                <td class="quantity__item"><span class="quantity">{{$orders->address}}</span></td>

                                <td class="quantity__item"><span class="quantity">{{Carbon\Carbon::parse($orders->created_at)->diffForHumans()}}</span></td>
                                <td></td>
                                <td class="quantity__item"><span class="quantity"><span style="color: #0a0e14">$</span>{{$orders->total_price}}</span></td>
                                <td class="quantity__item">
                                    <span class="quantity">
                                        @if($orders->status  === 0)
                                            {{"Đã hủy"}}
                                        @elseif($orders->status === 1)
                                            {{"Chờ xác nhận"}}
                                        @elseif($orders->status === 2)
                                            {{"Đang giao hàng"}}
                                        @elseif($orders->status === 3)
                                            {{"Đã nhận"}}
                                        @endif
                                    </span>
                                </td>
                                <td class="quantity__item">
                                    <a class="btn btn-info btn-sm" href="{{route('order-bill-detail',parameters: ['id'=>$orders->id_order])}}">
                                        <i class="fas fa-money-bill-alt">
                                        </i>
                                        Xem
                                    </a>

                                    @if($orders->status === 1)
                                        <a class="btn btn-info btn-sm" onclick="return window.confirm('Are you sure you want to destroy this order? ?')" href="{{route('order-bill-destroy',parameters: ['id'=>$orders->id_order])}}" >
                                            <i class="fas fa-remove-alt">
                                            </i>
                                            Hủy đơn
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <div><p style="color: red">Không có đơn hàng nào </p></div>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{route('shop')}}">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection
