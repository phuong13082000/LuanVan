@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order</li>
        </ol>
    </nav>

            <div class="mt-3">
                Thông tin đăng nhập
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

    <br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển hàng
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình thức thanh toán</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_diachi}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_notes}}</td>
                        <td>@if($shipping->shipping_phuongthuc==0) Chuyển khoản @else Tiền mặt @endif</td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br><br>

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê chi tiết đơn hàng
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng kho còn</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Tổng tiền</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach($order_details as $key => $details)
                        @php
                            $i++;
                            $subtotal = $details->sanpham_gia*$details->sanpham_soluong;
                            $total+=$subtotal;
                        @endphp
                        <tr class="color_qty_{{$details->product_id}}">

                            <td><i>{{$i}}</i></td>
                            <td>{{$details->product_name}}</td>
                            <td>{{$details->sanPham->soluong}}</td>
                            <td>
                                <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->sanpham_id}}" value="{{$details->sanpham_soluong}}" name="product_sales_quantity">

                                <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->sanpham_id}}" value="{{$details->sanPham->soluong}}">

                                <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

                                <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->sanpham_id}}">

                                @if($order_status!=2)
                                    <button class="btn btn-primary update_quantity_order" data-product_id="{{$details->sanpham_id}}" name="update_quantity_order">Cập nhật</button>
                                @endif
                            </td>
                            <td>{{number_format($details->sanpham_gia ,0,',','.')}}đ</td>
                            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            @php
                                $total_coupon = 0;
                                $total_coupon = $total + 50000 ;
                            @endphp
                            Tổng : {{number_format($total,0,',','.')}}đ <br>
                            Phí ship : 50.000đ </br>
                            Thanh toán: {{number_format($total_coupon,0,',','.')}}đ
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            @foreach($orders as $order)
                                @if($order->status==1)
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Chọn hình thức đơn hàng-----</option>
                                            <option id="{{$order->order_id}}" selected value="1">Chưa xử lý</option>
                                            <option id="{{$order->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                                            <option id="{{$order->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>
                                        </select>
                                    </form>
                                @elseif($order->status==2)
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Chọn hình thức đơn hàng-----</option>
                                            <option id="{{$order->order_id}}" value="1">Chưa xử lý</option>
                                            <option id="{{$order->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>
                                            <option id="{{$order->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>
                                        </select>
                                    </form>

                                @else
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Chọn hình thức đơn hàng-----</option>
                                            <option id="{{$order->order_id}}" value="1">Chưa xử lý</option>
                                            <option id="{{$order->order_id}}"  value="2">Đã xử lý-Đã giao hàng</option>
                                            <option id="{{$order->order_id}}" selected value="3">Hủy đơn hàng-tạm giữ</option>
                                        </select>
                                    </form>

                                @endif
                            @endforeach

                        </td>
                    </tr>
                    </tbody>
                </table>
                <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a>
            </div>

        </div>
    </div>
@endsection
