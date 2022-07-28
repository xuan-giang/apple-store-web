@extends('menu')

@section('content')
<!-- Banner Carousel Section Begin -->
<section class="hero">
      <div class="hero__slider owl-carousel">
          @foreach($images_banner as $image_banner)
              <div class="hero__items set-bg" data-setbg="{{asset($image_banner->get_url_image())}}">
                  <div class="container">
                      <div class="row">
                          <div class="col-xl-5 col-lg-7 col-md-8">
                              <div class="hero__text">
                                  <h6>{{$image_banner->header}}</h6>
                                  <h2>{{$image_banner->title}}</h2>
                                  <p>{{$image_banner->content}}</p>
                                  <a  href="{{route('shop')}}" class="primary-btn">Mua ngay</a>
                                  <div class="hero__social">
                                      <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                      <a href="#"><i class="fa fa-twitter"></i></a>
                                      <a href="#"><i class="fa fa-pinterest"></i></a>
                                      <a href="#"><i class="fa fa-instagram"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
             @endforeach

      </div>

</section>
<!-- Banner Carousel Section End -->

<!-- Top 3 Section Begin -->
<?php //print_r($images_top_3_best_sell[0]->name) ?>
<section class="banner spad">
    <div class="container">
        <div class="row">
            @if(isset($images_top_3_best_sell[0]))
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{asset($images_top_3_best_sell[0]->get_url_image())}}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>{{$images_top_3_best_sell[0]->name}}</h2>
                            <a href="{{route('details',parameters:['id'=>$images_top_3_best_sell[0]->id])}}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($images_top_3_best_sell[1]))
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{asset($images_top_3_best_sell[1]->get_url_image())}}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>{{$images_top_3_best_sell[1]->name}}</h2>
                            <a href="{{route('details',parameters:['id'=>$images_top_3_best_sell[1]->id])}}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($images_top_3_best_sell[2]))
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{asset($images_top_3_best_sell[2]->get_url_image())}}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>{{$images_top_3_best_sell[2]->name}}</h2>
                            <a href="{{route('details',parameters:['id'=>$images_top_3_best_sell[2]->id])}}">Mua ngày</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
<!-- Top 3 Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Bán chạy nhất</li>
                    <li data-filter=".new-arrivals">Sản phẩm mới</li>
                    <li data-filter=".hot-sales">Giảm giá sốc</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">


{{--            Phân chia theo 3 loại --}}
            @foreach($product_best_sell as $product)
{{--            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix  ">--}}
{{--                <div class="product__item sale">--}}
{{--                    <div class="product__item__pic set-bg" data-setbg="{{asset($product->get_url_image())}}">--}}
{{--                        <span class="label">Mới</span>--}}
{{--                        <ul class="product__hover">--}}
{{--                            <li><a href="#"><img src="../img/icon/heart.png" alt=""></a></li>--}}
{{--                            <li><a href="#"><img src="../img/icon/compare.png" alt=""> <span>So sánh</span></a></li>--}}
{{--                            <li><a href="#"><img src="../img/icon/search.png" alt=""></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    @include('product.product_basic')--}}
{{--                </div>--}}
{{--            </div>--}}

            @endforeach


            @foreach($product_new_arrivals as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix   new-arrivals ">
                    <div class="product__item sale">
                        <a href="{{route('details',parameters:['id'=>$product->id])}}">
                            <div  class="product__item__pic set-bg" data-setbg="{{$product->get_url_image()}}">
                                <span class="label"> Mới </span>
                            </div>
                        </a>
                        @include('product.product_basic')
                    </div>
                </div>

            @endforeach

            @foreach($product_hot_sales as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix   hot-sales ">
                    <div class="product__item sale">
                        <a href="{{route('details',parameters:['id'=>$product->id])}}">
                            <div  class="product__item__pic set-bg" data-setbg="{{$product->get_url_image()}}">
                                <span class="label"> Khuyến mãi </span>
                            </div>
                        </a>
                        @include('product.product_basic')
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Ipad Air <br /> <span>Iphone Promax</span> <br /> Apple watch</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="{{asset("img/image-product/".$product_sell_time->image)}}" alt="">
                    <div class="hot__deal__sticker">
                        <span>Giảm giá</span>
                        <h5>${{$product_sell_time->price}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Giao dịch trong tuần</span>
                    <h2>{{$product_sell_time->name}}</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Ngày</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Giờ</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Phút</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Giây</p>
                        </div>
                    </div>
                    <a href="{{route('details',parameters:['id'=>$product_sell_time->id])}}" class="primary-btn">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
<section class="instagram spad" style="margin-bottom: 200px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    @foreach($product_price_max as $product)
{{--                        <div class="instagram__pic__item set-bg" data-setbg="{{asset("img/image-product/".$product->image)}}"></div>--}}
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                    @endforeach
                    {{--<div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>--}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>Instagram</h2>
                    <h5>Mọi người đều có một câu chuyện để kể</h5>
                    <h3>#Apple_Store</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
{{--<section class="latest spad">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="section-title">--}}
{{--                    <span>Tin mới nhất</span>--}}
{{--                    <h2>Xu hướng thời trang mới</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                <div class="blog__item">--}}
{{--                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>--}}
{{--                    <div class="blog__item__text">--}}
{{--                        <span><img src="img/icon/calendar.png" alt=""> 16 tháng 4 năm 2022</span>--}}
{{--                        <h5>Điện thoại thông minh nào tốt nhất</h5>--}}
{{--                        <a href="#">Đọc thêm</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                <div class="blog__item">--}}
{{--                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>--}}
{{--                    <div class="blog__item__text">--}}
{{--                        <span><img src="img/icon/calendar.png" alt=""> 21 tháng 4 năm 2022</span>--}}
{{--                        <h5>Điện thoại thông minh nào tốt nhất</h5>--}}
{{--                        <a href="#">Đọc thêm</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                <div class="blog__item">--}}
{{--                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>--}}
{{--                    <div class="blog__item__text">--}}
{{--                        <span><img src="img/icon/calendar.png" alt=""> 28 tháng 8 năm 2022</span>--}}
{{--                        <h5>Điện thoại thông minh nào tốt nhất</h5>--}}
{{--                        <a href="#">Đọc thêm</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- Latest Blog Section End -->



@endsection
