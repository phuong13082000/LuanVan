@extends('welcome')

@section('index')
    @include('pages.nav')
    <div class="container">
        <div class="mt-3">
            <p>Điền thông tin gửi hàng</p>
        </div>

        {!! Form::open(['url'=>'/confirm-order', 'method'=>'POST']) !!}
            <div class="mb-3">
                <div class="form-group">
                    {!! Form::label('shipping_email', 'Email', []) !!}
                    {!! Form::email('shipping_email', Session::get('customer_email'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    {!! Form::label('shipping_name', 'Họ tên', []) !!}
                    {!! Form::text('shipping_name', Session::get('customer_name'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    {!! Form::label('shipping_address', 'Địa chỉ', []) !!}
                    {!! Form::text('shipping_address', '', ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    {!! Form::label('shipping_phone', 'Số điện thoại', []) !!}
                    {!! Form::text('shipping_phone', Session::get('customer_phone'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    {!! Form::label('shipping_notes', 'Ghi chú', []) !!}
                    {!! Form::textarea('shipping_notes', '', ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    {!! Form::label('shipping_method', 'Chọn hình thức thanh toán', []) !!}
                    {!! Form::select('shipping_method', ['0'=>'Chuyển khoản', '1'=>'Tiền mặt'], '', ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="mb-3">
                {!! Form::submit('Xác nhận đơn hàng', ['class'=>'btn btn-success']) !!}
            </div>

        {!! Form::close() !!}

    </div>

@endsection
