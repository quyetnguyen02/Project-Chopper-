@extends('trang-chu.layout.index')
@section('content')

    <main id="main" class="main">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('profile')}}">Order Details</a></li>
                <li class="breadcrumb-item active">Review</li>

            </ol>
        </nav>
        <div class="pagetitle" style="margin-left: 100px">
            <h1>Tài Khoản Của Tôi</h1>
        </div><!-- End Page Title -->
        <div class="row" style="margin-left:100px ">

            <div style="float: left;">

                <div class="pagetitle">
                    <h2>Thông Tin Đơn Hàng</h2>
                </div><!-- End Page Title -->


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ngày tạo đơn hàng :{{$checkout->created_at}}</strong>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Người nhận:
                           {{$checkout->name}}</strong>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Địa chỉ:
                           {{$checkout->address}}-{{$checkout->district}}-{{$checkout->ward}}-{{$checkout->city}}</strong>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Số điện thoại :{{$checkout->phone}}</strong>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Trạng Thái:@switch($checkout->status)
                                @case(0)
                                Chờ Xác Nhận
                                @break
                                @case(1)
                                Đang Giao Hàng
                                @break

                                @case(2)
                                Đã Thanh Toán
                                @break

                                @case(3)
                                Đã Hủy Đơn
                                @break

                            @endswitch</strong>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hình Thức Thanh toán:Nhận Tiền Khi Giao Hàng</strong>

                    </div>
                </div>






            </div>

            <div style="float: right; ">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title" style="text-align: center">Lịch Sử Đặt Hàng</h5>
                            @if($message = Session::get('success'))
                                <div class="alert alert-success">
                                    {{$message}}
                                </div>
                            @endif

                            <h5 class="card-title"></h5>

                            <!-- Table with stripped rows -->
                            <div>


                                <table class="table datatable">
                                    <thead>
                                    <tr>


                                        <th scope="col">Sản Phẩm</th>
                                        <th scope="col">Số Lượng</th>
                                        <th scope="col">Đơn Giá</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($orders as $order)

                                        <tr>


                                            <td>{{$order->pro_name}}</td>

                                            <td>{{$order->quantity}}</td>
                                            <td>{{number_format($order->total_price)}}$</td>





                                        </tr>

                                        </tr>
                                      @endforeach



                                    </tbody>
                                </table>



                            </div>


                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group" style="margin-left: 500px">
                        <strong>Tổng Tiền + Tiền Ship:{{number_format($checkout->total)}}$</strong>

                    </div>
                </div>



            </div>







        </div>




    </main>


@endsection
