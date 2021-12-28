@extends('trang-chu.layout.index')
@section('content')
    <div class="wapper">
        <div class="pagetitle" style="margin-left: 150px">
            <h1>Tài Khoản Của Tôi</h1>
        </div><!-- End Page Title -->
        <div style="margin-left:500px;margin-top: 50px ">
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
            <h3>Thay đổi thông tin tài khoản</h3>
            <form action="{{route('profile.update',$user->id)}}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="name" style="font-size: 20px">Email: </label>
                    <input type="email" name="email" style="margin-left: 48px" value="{{$user->email}}" placeholder="Mời Nhập Email">
                </div>

                <div class="row mb-3">
                    <label for="name" style="font-size: 20px">Điện Thoại: </label>
                    <input type="number" name="phone" value="{{$user->phone}}" placeholder="Mời Nhập Số Điện Thoại">
                </div>

                <div class="row mb-3">
                    <label for="name" style="font-size: 20px">Tên: </label>
                    <input type="text" name="name" style="margin-left: 63px" value="{{$user->name}}" placeholder="Mời Nhập Tên">
                </div>

                <div class="row mb-3">
                    <label for="name" style="font-size: 20px">Địa Chỉ: </label>
                    <input type="text" name="Address" style="margin-left: 30px" value="{{$user->address}}" placeholder="Mời Nhập Địa Chỉ">
                </div>

                <div class="col-sm-10" style="margin-left: 58px">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>

            </form>


        </div>



    </div>



@endsection
