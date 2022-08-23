@extends('menu')

@section('content')


    <!-- Main Sidebar Container -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đơn đặt hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route("home")}}">Trang chủ</a>
                            <a href="{{route("order-list")}}">Danh sách đặt</a>
                            <span>Đơn đặt hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Content Wrapper. Contains page content -->


    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table  >
                            <tr ><h2 style="font-weight: bold">Thông tin hóa đơn</h2></tr>
                            <tr>
                                <td><h4 style="font-weight: bold">Mã hóa đơn : </h4></td>
                                <td><h5>{{$bill->id_order}}</h5></td>
                            </tr>
                            <tr>
                                <td><h4>Tên khách hàng : </h4></td>
                                <td><h5>{{$bill->fullname}}</h5></td>
                            </tr>

                            <tr>
                                <td><h4>Địa chỉ : </h4></td>
                                <td><h5>{{$bill->address}}</h5></td>
                            </tr>

                            <tr>
                                <td><h4>Email : </h4></td>
                                <td><h5>{{$bill->email}}</h5></td>
                            </tr>

                            <tr>
                                <td><h4>SDT : </h4></td>
                                <td><h5>{{$bill->phone_number}}</h5></td>
                            </tr>

                            <tr>
                                <td><h4>Trạng thái : </h4></td>
                                <td><h5>@if($bill->status  === 0) {{"Đã hủy"}} @elseif($bill->status === 1) {{"Chờ xác nhận"}} @elseif($bill->status === 2) {{"Đã xác nhận"}} @elseif($bill->status === 3) {{"Đã thanh toán"}} @endif   </h5></td>
                            </tr>

                            <tr>
                                <td><h4>Phương thức thanh toán : </h4></td>
                                <td><h5>{{$bill->payment_method}}</h5></td>
                            </tr>

                            <tr>
                                <td><h4>Ghi Chú : </h4></td>
                                <td><h5>@if($bill->note === "") {{"Không có"}} @else {{$bill->note}}  @endif</h5></td>
                            </tr>

                            <tr>
                                <td><h4>Đơn tạo lúc  : </h4></td>
                                <td><h5>{{$bill->created_at}}</h5></td>
                            </tr>

                        </table>

                        <h2>Thông tin đơn hàng</h2>
                        <div class="shopping__cart__table">
                            <table border="1" width="80%" style="margin: auto" >
                                <thead>
                                <tr>
                                    <th align="center" style="text-align: center">STT</th>
                                    <th align="center" style="text-align: center">Mã sản phẩm</th>
                                    <th align="center" style="text-align: center">Sản phẩm</th>
                                    <th align="center" style="text-align: center">Ảnh</th>
                                    <th align="center" style="text-align: center">Giá</th>
                                    <th align="center" style="text-align: center">Số lượng</th>
                                    <th align="center" style="text-align: center">Tổng</th>
                                    {{--                            <th>Mua</th>--}}

                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt=1 ?>
                                @php
                                    $subTotal   = 0;
                                    $taxRate    = 18;
                                    $taxPayment = 0;
                                    $totalPayment = 0;
                                @endphp
                                @foreach($list_products as $product)



                                    <tr>
                                        <td align="center">{{$stt++}}</td>
                                        <td align="center">{{$product->id}}</td>
                                        <td  align="center">

                                            <div>
                                                <h6>{{$product->name}}</h6>
                                            </div>
                                        </td>

                                        <td align="center">
                                            <img width="90" height="90 "src="{{"img/image-product/".$product->image}}" alt="">
                                        </td>
                                        <td align="center">
                                            <h5><span >${{$product->price}}</span></h5>
                                        </td>
                                        <td align="center">
                                            <div style="margin-left:10px;margin-right:10px;" ><span class="span-quantity">{{$product->qty}}</span></div>
                                        </td>

                                        <td align="center">
                                            <div style="margin-left:10px;margin-right:10px;" ><span class="span-quantity">${{$product->qty * $product->price}}</span></div>
                                            <div style="display: none">{{$subTotal += ($product->qty * $product->price)}}</div>
                                        </td>

                                    </tr>
                                @endforeach
                                <div style="display: none">{{$subTotal += ($product->qty * $product->price)}}</div>
                                <div style="display: none">{{$taxPayment = $subTotal * $taxRate / 100}}</div>
                                <div style="display: none">{{$totalPayment = $subTotal + $taxPayment}}</div>

                                <tr>
                                    <td colspan="7">
                                        <div class="total-part">

                                            <div class="total-left w-15 float-right text-bold" style="margin-right: 50px" align="right">
                                                <p>${{$subTotal}}</p>
                                                <p>${{$taxPayment}}</p>
                                                <p>${{$totalPayment}}</p>
                                            </div>

                                            <div class="total-left w-85 float-right" align="right">
                                                <p>Sub Total:  </p>
                                                <p>Tax ({{$taxRate}}%):  </p>
                                                <p>Total Payable:   </p>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div>
                                <p>Mọi thắc mắc liên hệ qua <a href="">fanpage</a> hoặc qua SDT : 0394830932</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content-wrapper -->

    <script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/jquery.nice-select.min.js")}}"></script>
    <script src="{{asset("js/jquery.nicescroll.min.js")}}"></script>
    <script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("js/jquery.countdown.min.js")}}"></script>
    <script src="{{asset("js/jquery.slicknav.js")}}"></script>
    <script src="{{asset("js/mixitup.min.js")}}"></script>
    <script src="{{asset("js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection
<!-- ./wrapper -->


