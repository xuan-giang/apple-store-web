@extends('menu')
@section('content')
{{--    {{$new_query_string}}--}}
    <!-- Breadcrumb Section Begin -->

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Cửa hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <span>Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="">
                                <input type="text" name="search" placeholder="Tìm kiếm...">
                                <button><img src="{{asset('img/icon/search.png')}}" alt=""></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Phân loại</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a @if($category_selected ===null) style="color: black;"  @endif href="{{route('shop')}}">Tất cả</a></li>
                                                    @foreach($categories as $category)
                                                        <li><a @if(!strcmp($category_selected , $category->name)) style="color: black;"  @endif href="{{route('shop',parameters: ["category"=>$category->name,'price_max'=>$price_max_selected,'price_min'=>$price_min_selected,'tag'=>$tag_selected])}}">{{$category->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Phân loại theo giá</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>

                                                    <li><a @if($price_min_selected === null ) style="color: black;" @endif href="{{route('shop')}}">Tất cả</a></li>
                                                    @foreach($level_price as $price)
                                                        <li><a @if($price_min_selected == $price && $price_min_selected != null) style="color: black;"  @endif   href="{{route('shop',parameters: ["price_min"=>$price, "price_max"=>$price+500,'category'=>$category_selected,'tag'=>$tag_selected])}}">${{$price}} - ${{$price+500}}</a></li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Màu</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__color">
                                                <label class="c-1" for="sp-1">
                                                    <input type="radio" id="sp-1">
                                                </label>
                                                <label class="c-2" for="sp-2">
                                                    <input type="radio" id="sp-2">
                                                </label>
                                                <label class="c-3" for="sp-3">
                                                    <input type="radio" id="sp-3">
                                                </label>
                                                <label class="c-4" for="sp-4">
                                                    <input type="radio" id="sp-4">
                                                </label>
                                                <label class="c-5" for="sp-5">
                                                    <input type="radio" id="sp-5">
                                                </label>
                                                <label class="c-6" for="sp-6">
                                                    <input type="radio" id="sp-6">
                                                </label>
                                                <label class="c-7" for="sp-7">
                                                    <input type="radio" id="sp-7">
                                                </label>
                                                <label class="c-8" for="sp-8">
                                                    <input type="radio" id="sp-8">
                                                </label>
                                                <label class="c-9" for="sp-9">
                                                    <input type="radio" id="sp-9">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Thể loại</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="{{route('shop',parameters: ["category"=>$category_selected,'price_max'=>$price_max_selected,'price_min'=>$price_min_selected,'tag'=>null])}}">All</a>
                                                <a href="{{route('shop',parameters: ["category"=>$category_selected,'price_max'=>$price_max_selected,'price_min'=>$price_min_selected,'tag'=>'Pro'])}}">Pro</a>
                                                <a href="{{route('shop',parameters: ["category"=>$category_selected,'price_max'=>$price_max_selected,'price_min'=>$price_min_selected,'tag'=>'Pro max'])}}">Pro max</a>
                                                <a href="{{route('shop',parameters: ["category"=>$category_selected,'price_max'=>$price_max_selected,'price_min'=>$price_min_selected,'tag'=>'Plus'])}}">Plus</a>
                                                <a href="{{route('shop',parameters: ["category"=>$category_selected,'price_max'=>$price_max_selected,'price_min'=>$price_min_selected,'tag'=>'Mini'])}}">Mini</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Hiển thị {{sizeof($products)}} trong số {{$total_product}} kết quả</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                {{--<div class="shop__product__option__right">
                                    <p>Sắp xếp theo giá:</p>
                                    <select>
                                        <option value="">Thấp đến cao</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                           @include('product.product')
                        @endforeach
                    </div>

                    {{ $products->links('shop.my_pagination') }}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->


@endsection
