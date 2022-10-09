@extends('welcome')

@section('index')
    @include('pages.nav')

    <div class="container">
        <div class="row mt-3">
            @foreach($chitiet_sanpham as $sanpham)
                @php
                    $gia = number_format($sanpham->gia, 0, '', ',');
                    $giaKhuyenMai =  number_format($sanpham->giakhuyenmai, 0, '', ',');
                    $phanTramGiam = round(100 - ($sanpham->giakhuyenmai / $sanpham->gia * 100), PHP_ROUND_HALF_UP);
                @endphp

                <div class="mb-3">
                    <b style="font-size: 18px">{{$sanpham->danhMuc->name }} - {{$sanpham->name}}</b><br>
                </div>
                <hr>
                <div class="col-sm-6">
                    <img class="img-fluid" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}" alt="{{$sanpham->name}}">
                    <hr>
                    {!! $sanpham->noidung !!}
                </div>

                <div class="col-sm-6">
                    <form action="{{url('/save-cart')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" value="{{$sanpham->id}}" class="cart_product_id_{{$sanpham->id}}">
                        <input type="hidden" value="{{$sanpham->name}}" class="cart_product_name_{{$sanpham->id}}">
                        <input type="hidden" value="{{$sanpham->hinhanh}}" class="cart_product_image_{{$sanpham->id}}">
                        <input type="hidden" value="{{$sanpham->giakhuyenmai ? $sanpham->giakhuyenmai : $sanpham->gia }}" class="cart_product_price_{{$sanpham->id}}">

                    @if($sanpham->soluong)
                        @if($sanpham->giakhuyenmai)
                            Giá: <br> <b style="color: red">{{ $giaKhuyenMai }} VND</b>
                            <del>&nbsp;{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b><br>
                        @else
                            <b>Giá: <br> {{ $gia }} VND</b><br>
                        @endif
                    @else
                        <b style="color: red">Hết Hàng</b><br>
                    @endif

                    <!--Khuyến mãi-->
                    <div class="row justify-content-center mt-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"><b>Khuyến mãi: </b></div>
                                <div class="card-body">
                                    <div class="mb-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--soluong--}}
                    <span>
                        <label>Số lượng:
                            <input name="qty" type="number" min="1" class="cart_product_qty_{{$sanpham->id}}" value="1">
                        </label>
                        <input name="productid_hidden" type="hidden" value="{{$sanpham->id}}">
                    </span>

                    <input type="submit" value="Thêm giỏ hàng" class="btn btn-primary add-to-cart" data-id_product="{{$sanpham->id}}">

                    <!--Cấu hình-->
                    <div class="row justify-content-center mt-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <b style="font-size: 18px"> Cấu hình {{$sanpham->name}}: </b>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        {!! $sanpham->cauhinh !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    @endforeach

                </div>
        </div>

@endsection
