@extends('welcome')

@section('index')
    @include('pages.nav')
    <div class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>

                            {!! Form::open(['url'=>'/login-customer', 'method'=>'POST']) !!}
                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::label('email_account', 'Tài khoản', []) !!}
                                    {!! Form::email('email_account',  old('email_account') , ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::label('password_account', 'Mật khẩu', []) !!}
                                    {!! Form::password('password_account', ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::checkbox('checkbox', 1, '') !!}
                                    {!! Form::label('checkbox', 'Ghi nhớ đăng nhập', []) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                {!! Form::submit('Đăng nhập', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                    </div><!--/login form-->
                </div>

                <div class="col-sm-2">
                    <h2 class="or">Hoặc</h2>
                </div>

                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng ký</h2>

                            {!! Form::open(['url'=>'/add-customer', 'method'=>'POST']) !!}

                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::label('customer_name', 'Họ và tên', []) !!}
                                    {!! Form::text('customer_name',  old('customer_name') , ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::label('customer_email', 'Địa chỉ email', []) !!}
                                    {!! Form::email('customer_email',  old('customer_email') , ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::label('customer_password', 'Mật khẩu', []) !!}
                                    {!! Form::password('customer_password', ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    {!! Form::label('customer_phone', 'Phone', []) !!}
                                    {!! Form::text('customer_phone',  old('customer_phone') , ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="mb-3">
                                {!! Form::submit('Đăng ký', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </div>
@endsection
