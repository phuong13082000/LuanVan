@extends('welcome')

@section('index')
    @include('pages.nav')
    <div class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="{{url('/login-customer')}}" method="POST">
                            @csrf
                            <input type="text" name="email_account" placeholder="Tài khoản"/><br>
                            <input type="password" name="password_account" placeholder="Password"/><br>
                            <span>
								<input type="checkbox" class="checkbox">Ghi nhớ đăng nhập
							</span><br>
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng ký</h2>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            @csrf
                            <input type="text" name="customer_name" placeholder="Họ và tên"/><br>
                            <input type="email" name="customer_email" placeholder="Địa chỉ email"/><br>
                            <input type="password" name="customer_password" placeholder="Mật khẩu"/><br>
                            <input type="text" name="customer_phone" placeholder="Phone"/><br>
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </div>
@endsection
