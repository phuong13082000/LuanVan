@extends('welcome')

@section('index')
    @include('pages.nav')
    @include('pages.carousel')
<!--Tabs-->
<div class="container">
    <div class="mt-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="sanphammoi-tab" data-bs-toggle="tab" data-bs-target="#sanphammoi" type="button" role="tab" aria-controls="sanphammoi" aria-selected="true">
                    <b>
                        Sản Phẩm Mới Nhất
                    </b>
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sanphamkhuyenmai-tab" data-bs-toggle="tab" data-bs-target="#sanphamkhuyenmai" type="button" role="tab" aria-controls="sanphamkhuyenmai" aria-selected="false">
                    <b>
                        Sản Phẩm Khuyến Mãi
                    </b>
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="phukien-tab" data-bs-toggle="tab" data-bs-target="#phukien" type="button" role="tab" aria-controls="phukien" aria-selected="false">
                    <b>
                        Phụ kiện
                    </b>
                </button>
            </li>
        </ul>
        <div class="mt-3">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="sanphammoi" role="tabpanel" aria-labelledby="sanphammoi-tab">
                    <div class="row">

                        @foreach($list_sanpham_moi as $sanpham_moi)
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                                    <img src="{{asset('uploads/sanpham/'.$sanpham_moi->hinhanh)}}" class="card-img-top" alt="{{ $sanpham_moi->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sanpham_moi->name }}</h5>
                                        <p class="card-subtitle">
                                            @php
                                                $gia = number_format($sanpham_moi->gia, 0, '', ',');
                                                $giaGiam = number_format($sanpham_moi->giakhuyenmai, 0, '', ',');
                                                $phanTramGiam = round(100 - ($sanpham_moi->giakhuyenmai / $sanpham_moi->gia * 100), PHP_ROUND_HALF_UP); //PHP_ROUND_HALF_UP làm tròn 1,5->2
                                            @endphp

                                            @if($sanpham_moi->soluong)
                                                @if($sanpham_moi->giakhuyenmai)
                                                    <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                                    <br><b>{{ $giaGiam }} VND</b>
                                                @else
                                                    <b>{{ $gia }} VND</b>
                                                @endif
                                            @else
                                                <b style="color: red">Hết Hàng</b>
                                            @endif

                                        </p>
                                        <p class="card-text">{!! $sanpham_moi->cauhinh !!}</p>

                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Buy</a>
                                        <a href="{{route('detail',$sanpham_moi->slug)}}" class="btn btn-outline-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="tab-pane fade" id="sanphamkhuyenmai" role="tabpanel" aria-labelledby="sanphamkhuyenmai-tab">
                    <div class="row">

                        @foreach($list_sanpham_khuyenmai as $sanpham_khuyenmai)
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                                    <img src="{{asset('uploads/sanpham/'.$sanpham_khuyenmai->hinhanh)}}" class="card-img-top" alt="{{ $sanpham_khuyenmai->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sanpham_khuyenmai->name }}</h5>
                                        <p class="card-subtitle">
                                            @php
                                                $gia = number_format($sanpham_khuyenmai->gia, 0, '', ',');
                                                $giaKhuyenMai =  number_format($sanpham_khuyenmai->giakhuyenmai, 0, '', ',');
                                                $phanTramGiam = round(100 - ($sanpham_khuyenmai->giakhuyenmai / $sanpham_khuyenmai->gia * 100), PHP_ROUND_HALF_UP);
                                            @endphp

                                            @if($sanpham_khuyenmai->soluong)
                                                @if($sanpham_khuyenmai->giakhuyenmai)
                                                    <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                                    <br><b>{{ $giaKhuyenMai }} VND</b>
                                                @else
                                                    <b>{{ $gia }} VND</b>
                                                @endif
                                            @else
                                                <b style="color: red">Hết Hàng</b>
                                            @endif

                                        </p>
                                        <p class="card-text">{!! $sanpham_khuyenmai->cauhinh !!}</p>

                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Buy</a>
                                        <a href="{{route('detail',$sanpham_khuyenmai->slug)}}" class="btn btn-outline-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="tab-pane fade" id="phukien" role="tabpanel" aria-labelledby="phukien-tab">
                    <div class="row">

                        @foreach($list_phukien as $phukien)
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                                    <img src="{{asset('uploads/sanpham/'.$phukien->hinhanh)}}" class="card-img-top" alt="{{ $phukien->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $phukien->name }}</h5>
                                        <p class="card-subtitle">
                                            @php
                                                $gia = number_format($phukien->gia, 0, '', ',');
                                                $giaKhuyenMai =  number_format($phukien->giakhuyenmai, 0, '', ',');
                                                $phanTramGiam = round(100 - ($phukien->giakhuyenmai / $phukien->gia * 100), PHP_ROUND_HALF_UP);
                                            @endphp

                                            @if($phukien->soluong)
                                                @if($phukien->giakhuyenmai)
                                                    <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                                    <br><b>{{ $giaKhuyenMai }} VND</b>
                                                @else
                                                    <b>{{ $gia }} VND</b>
                                                @endif
                                            @else
                                                <b style="color: red">Hết Hàng</b>
                                            @endif

                                        </p>
                                        <p class="card-text">{!! $phukien->cauhinh !!}</p>

                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Buy</a>
                                        <a href="{{route('detail',$phukien->slug)}}" class="btn btn-outline-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
