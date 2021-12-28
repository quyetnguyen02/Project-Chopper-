@extends('trang-chu.layout.index')
@section('content')

    <div id="page-wrapper">
        <!-- header-area start -->

        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Thanh Toán</h2>
                            <ul>
                                <li><a href="index.html">Trang Chủ /</a></li>
                                <li><a href="cart.html">Giỏ Hàng /</a></li>
                                <li class="active"><a href="#">Thanh Toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- coupon-area start -->
            <div class="coupon-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
            <!-- coupon-area end -->
            <!-- checkout-area start -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Oops!</strong>There were some problems with your input. <br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="check-out-area">
                <div class="container">
                    <form action="{{route('order',Auth::user()->id)}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="checkbox-form">
                                    <h3>Thông Tin nhận hàng</h3>
                                    <div class="row">

                                        <div class="col-12 ">
                                            <div class="checkout-form-list">
                                                <label>Tên <span class="required">*</span></label>
                                                <input type="text" name="name" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ <span class="required">*</span></label>
                                                <input type="text" name="address" placeholder="Số nhà - Phố">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Xã/ Phường <span class="required">*</span></label>
                                                <input type="text" name="district">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Quận/ Huyện <span class="required">*</span></label>
                                                <input type="text" name="ward" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="checkout-form-list">
                                                <label>Tỉnh / Thành Phố <span class="required">*</span></label>
                                                <input type="text" name="city">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Điện Thoại <span class="required">*</span></label>
                                                <input type="number" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Email <span class="required">*</span></label>
                                                <input type="email" placeholder="" name="email">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="order-notes">
                                        <div class="checkout-form-list">
                                            <label>Ghi chú </label>
                                            <textarea
                                                placeholder="Ghi chú về đơn hàng của bạn, Ví dụ ghi chú đặc biệt để nhận hàng."
                                                rows="10" cols="30" id="checkout-mess" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="your-order">
                                    <h3>Đơn hàng của bạn</h3>
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Tổng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $total=0;
                                            @endphp
                                            @foreach($carts as $pro_id=>$cart)
                                                @php

                                                    $total += $cart['price'] * $cart['quantity'];

                                                @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$cart['name']}}<strong class="product-quantity"> ×
                                                        {{$cart['quantity']}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{number_format($cart['price'] * $cart['quantity'])}}$</span>
                                                </td>
                                            </tr>


                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tổng tiền hàng</th>
                                                <td><span class="amount">{{number_format($total)}}$</span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Phí Vận Chuyển</th>
                                                <td>
                                                    <ul>
                                                        <li></li>
                                                        <label>30$</label>
                                                        </li>
                                                        <li></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng đơn hàng</th>
                                                <td><strong><span  class="amount">{{$total +30}}$</span></strong>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <div class="collapses-group">
                                                <div class="panel-group" id="accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h4 class="panel-title">
                                                               Hình Thức Thanh Toán:Tiền Mặt
                                                            </h4>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Đặt Hàng" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- checkout-area end -->
        </div>
        <!-- shop-main-area end -->
    </div>
    @endsection
