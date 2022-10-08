@extends('welcome')

@section('index')
    @include('pages.nav')
    <div class="container">
        <h4 class="mt-3">Danh Mục: {{ $tendanhmuc }}</h4>
        <div class="row mt-3">
            @foreach($chitiet_sanpham as $sanpham)
                <div class="col-sm-3">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                        <img src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}" class="card-img-top" alt="{{ $sanpham->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sanpham->name }}</h5>
                            <p class="card-subtitle">
                                @php
                                    $gia = number_format($sanpham->gia, 0, '', ',');
                                    $giaKhuyenMai =  number_format($sanpham->giakhuyenmai, 0, '', ',');
                                    $phanTramGiam = round(100 - ($sanpham->giakhuyenmai / $sanpham->gia * 100), PHP_ROUND_HALF_UP);
                                @endphp

                                @if($sanpham->soluong)
                                    @if($sanpham->giakhuyenmai)
                                        <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                        <br><b>{{ $giaKhuyenMai }} VND</b>
                                    @else
                                        <b>{{ $gia }} VND</b>
                                    @endif
                                @else
                                    <b style="color: red">Hết Hàng</b>
                                @endif

                            </p>
                            <p class="card-text">{!! $sanpham->cauhinh !!}</p>

                            <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Buy</a>
                            <a href="{{route('detail',$sanpham->slug)}}" class="btn btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
