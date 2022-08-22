<!DOCTYPE html>
<html>
<head>
    <title>Bill Information</title>

</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
    *{ font-family: DejaVu Sans !important;}
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Apple Store - Bill Order</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">

        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{$bill->id_order}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{$bill->created_at}}</span></p>
    </div>

    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Apple Store</p>
                    <p>Minh Khai, Bac Tu Liem, Ha Noi, Viet Nam</p>
                    <p>applestore@haui.com</p>

                    <p>Contact : 024 1234 569</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{$bill->fullname}}</p>
                    <p>{{$bill->address}}</p>
                    <p>{{$bill->email}}</p>
                    <p>Contact : {{$bill->phone_number}}</p>
                    <p>Note: @if($bill->note === "") {{"Không có"}} @else {{$bill->note}}  @endif</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>{{$bill->payment_method}}</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">


    <table border="1" width="80%" style="margin: auto" >
        <thead>
        <tr>
            <th align="center" style="text-align: center">No.</th>
            <th align="center" style="text-align: center">ID</th>
            <th align="center" style="text-align: center">Product</th>

            <th align="center" style="text-align: center">Price</th>
            <th align="center" style="text-align: center">Quantity</th>
            <th align="center" style="text-align: center">Sum</th>
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
                    <h5><span >{{$product->price}}</span></h5>
                </td>
                <td align="center">
                    <div style="margin-left:10px;margin-right:10px;" ><span class="span-quantity">{{$product->qty}}</span></div>
                </td>

                <td align="center">
                    <div style="margin-left:10px;margin-right:10px;" ><span class="span-quantity">{{$product->qty * $product->price}}</span></div>
                    <div style="display: none">{{$subTotal += ($product->qty * $product->price)}}</div>
                </td>

            </tr>


        @endforeach
        <div style="display: none">{{$taxPayment = $subTotal * $taxRate / 100}}</div>
        <div style="display: none">{{$totalPayment = $subTotal + $taxPayment}}</div>

        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total   </p>
                        <p>Tax ({{$taxRate}}%)   </p>
                        <p>Total Payable    </p>
                    </div>
                    <div class="total-right w-15 float-left text-bold mr-5" align="right">
                        <p>     {{$subTotal}}</p>
                        <p>     {{$taxPayment}}</p>
                        <p>     {{$totalPayment}}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
