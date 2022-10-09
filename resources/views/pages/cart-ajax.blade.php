@extends('welcome')

@section('index')
    @include('pages.nav')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="container">
        <div class="mt-3">
            <div class="table-responsive">

                {!! Form::open(['url'=>'/update-cart', 'method'=>'POST']) !!}
                @csrf
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sp</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @if(Session::get('cart'))
                        @php
                            $total = 0;
                        @endphp
                        @foreach(Session::get('cart') as $key => $cart)
                            @php
                                $subtotal = $cart['product_price']*$cart['product_qty'];
                                $total += $subtotal;
                            @endphp

                            <tr>
                                <td class="cart_product">
                                    <img src="{{asset('uploads/sanpham/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}"/>
                                </td>

                                <td class="cart_description">
                                    <p>{{$cart['product_name']}}</p>
                                </td>

                                <td class="cart_price">
                                    <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                </td>

                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <label>
                                            <input class="cart_quantity" type="number" min="1" name="cart_gia[{{$cart['session_id']}}]" value="{{$cart['product_price']}}">
                                        </label>
                                    </div>
                                </td>

                                <td class="cart_total">
                                    <p class="cart_total_price">{{number_format($subtotal,0,',','.')}}đ</p>
                                </td>

                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/del-product-ajax/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                                </td>

                            </tr>

                        @endforeach
                        <tr>
                            <td>
                                {!! Form::submit('Cập nhật giỏ hàng', ['class'=>'btn btn-default', 'name'=>'update_qty']) !!}
                            </td>

                            <td>
                                <a class="btn btn-default" href="{{url('/del-all-product')}}">Xóa tất cả</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5">
                                <center>
                                    @php
                                        echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                    @endphp
                                </center>
                            </td>
                        </tr>
                    @endif
                    </tbody>

                    {!! Form::close() !!}

                </table>

            </div>
        </div>
    </div>
@endsection

