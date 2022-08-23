@extends('menu')

@section('content')


<!-- Header Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route("home")}}">Trang chủ</a>
                        <a href="{{route("shop")}}">Cửa hàng</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
{{--                            <th>Mua</th>--}}
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products_in_cart as $product)

                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img width="90" height="90 "src="{{asset($product->get_url_image())}}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$product->name}}</h6>
                                        <h5><span class="span-price">{{$product->price}}</span></h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="row">
                                            <div class="btn-update-quantity" data-id="{{$product->id}}" data-type="decre" ><i class="fas fa-minus"></i></div>
                                            <div style="margin-left:10px;margin-right:10px;" ><span class="span-quantity">{{$cart[$product->id]}}</span></div>
                                            <div class="btn-update-quantity" data-id="{{$product->id}}" data-type="incre"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price"><span class="span-total-price">{{$product->price*$cart[$product->id]}}</span></td>
{{--                                <td class="cart__checkbox"><input type="checkbox" name=""></td>--}}
                                <td data-id="{{$product->id}}" class="cart__close"><i class="fa fa-close"></i></td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{route('shop')}}">Tiếp tục mua hàng</a>
                        </div>
                    </div>
{{--                    <div class="col-lg-6 col-md-6 col-sm-6">--}}
{{--                        <div class="continue__btn update__btn">--}}
{{--                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Mã giảm giá</h6>
                    <form action="#">
                        <input type="text" placeholder="Nhập mã">
                        <button type="submit">Áp dụng</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Tính tiền</h6>
                    <ul>
                        <li>Tổng <span id="subtotal">{{'$'.$total}}</span></li>
                        <li>Phải trả <span id="total">{{'$'.$total}}</span></li>
                    </ul>
                    <a @if(empty($_SESSION['cart'])) href="{{route('shop')}}"  onclick="myclick()"  @else  href="{{route('checkout')}}"  @endif
            class="primary-btn">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>

    <script language="javascript">
        function myclick() {
         alert("Giỏ hàng trống !!!");
        }
    </script>
</section>
<!-- Shopping Cart Section End -->







@endsection
