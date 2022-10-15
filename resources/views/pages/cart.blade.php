@extends('welcome')

@section('index')
    @include('pages.nav')
    @php
        $content = Cart::content();
        $count = Cart::count();
    @endphp
    @if($count != 0)
        <div class="container">
            <div class="mt-3">
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content as $v_content)
                            <tr>
                                <td class="cart_product">
                                    <img src="{{asset('uploads/sanpham/'.$v_content->options->image)}}" width="90" alt="{{$v_content->name}}"/>
                                </td>

                                <td class="cart_description">
                                    <h4>{{$v_content->name}}</a></h4>
                                </td>

                                <td class="cart_price">
                                    <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                                </td>

                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        {!! Form::open(['url'=>'/update-cart-quantity', 'method'=>'POST']) !!}
                                        <label>
                                            <input name="cart_quantity" type="number" min="1" max="{{$v_content->weight}}" class="cart_quantity_input" value="{{$v_content->qty}}">
                                        </label>
                                        {!! Form::submit('Cập nhật', ['class'=>'btn btn-success btn-sm']) !!}
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                        {!! Form::close() !!}
                                    </div>
                                </td>

                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        @php
                                            $subtotal = $v_content->price * $v_content->qty;
                                            echo number_format($subtotal).' '.'vnđ';
                                        @endphp
                                    </p>
                                </td>

                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <section id="do_action">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>Thành tiền <span>{{Cart::total().' '.'vnđ + Phí ship: 50,000 vnđ'}}</span></li>
                                </ul>
                                @php
                                    $customer_id = Session::get('id');
                                @endphp
                                @if($customer_id!=NULL)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCheckout">Thanh toán</button>
                                    <a class="btn btn-success" href="{{url('/')}}">Home</a>
                                @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLogin">Đăng nhập</button>
                                    <a class="btn btn-primary" href="{{url('/')}}">Home</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </section><!--/#do_action-->
        </div>
    @else
        <div class="container">
            <div class="mt-3">
                <a href="{{url('/')}}" style="text-decoration: none"> Quay lại trang chủ và chọn đồ để mua</a>
            </div>
        </div>
    @endif

    {{--modal login--}}
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLoginLable">Đăng nhập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

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

                    <div class="modal-footer mb-3">
                        {!! Form::submit('Đăng nhập', ['class'=>'btn btn-success']) !!}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    {{--modal checkout--}}
    <div class="modal fade" id="modalCheckout" tabindex="-1" aria-labelledby="modalCheckoutLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCheckoutLable">Điền thông tin gửi hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

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

                    <div class="modal-footer mb-3">
                        {!! Form::submit('Xác nhận đơn hàng', ['class'=>'btn btn-success']) !!}<br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
