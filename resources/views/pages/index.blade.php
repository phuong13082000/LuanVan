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
                            @php
                                $gia = number_format($sanpham_moi->gia, 0, '', ',');
                                $giaGiam = number_format($sanpham_moi->giakhuyenmai, 0, '', ',');
                                $phanTramGiam = round(100 - ($sanpham_moi->giakhuyenmai / $sanpham_moi->gia * 100), PHP_ROUND_HALF_UP); //PHP_ROUND_HALF_UP làm tròn 1,5->2
                            @endphp
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                                    @if($sanpham_moi->giakhuyenmai)
                                        <b class="rounded khuyenmai">- {{$phanTramGiam}} %</b>
                                    @endif
                                    <img src="{{asset('uploads/sanpham/'.$sanpham_moi->hinhanh)}}" class="card-img-top" alt="{{ $sanpham_moi->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sanpham_moi->name }}</h5>
                                        <p class="card-subtitle">
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

                                        {!! Form::open(['url' => '/save-cart', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                            {!! Form::hidden('productid_hidden', $sanpham_moi->id) !!}
                                            {!! Form::hidden('qty', 1) !!}

                                            <input type="submit" value="Buy" class="btn btn-outline-primary">
                                            <a href="{{route('detail',$sanpham_moi->slug)}}" class="btn btn-outline-primary">Detail</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="sanphamkhuyenmai" role="tabpanel" aria-labelledby="sanphamkhuyenmai-tab">
                    <div class="row">

                        @foreach($list_sanpham_khuyenmai as $sanpham_khuyenmai)
                            @php
                                $gia = number_format($sanpham_khuyenmai->gia, 0, '', ',');
                                $giaKhuyenMai =  number_format($sanpham_khuyenmai->giakhuyenmai, 0, '', ',');
                                $phanTramGiam = round(100 - ($sanpham_khuyenmai->giakhuyenmai / $sanpham_khuyenmai->gia * 100), PHP_ROUND_HALF_UP);
                            @endphp
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                                    <b class="rounded khuyenmai">- {{$phanTramGiam}} %</b>
                                    <img src="{{asset('uploads/sanpham/'.$sanpham_khuyenmai->hinhanh)}}" class="card-img-top" alt="{{ $sanpham_khuyenmai->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sanpham_khuyenmai->name }}</h5>
                                        <p class="card-subtitle">
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

                                        {!! Form::open(['url' => '/save-cart', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                            {!! Form::hidden('productid_hidden', $sanpham_khuyenmai->id) !!}
                                            {!! Form::hidden('qty', 1) !!}

                                            <input type="submit" value="Buy" class="btn btn-outline-primary">
                                            <a href="{{route('detail',$sanpham_khuyenmai->slug)}}" class="btn btn-outline-primary">Detail</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="tab-pane fade" id="phukien" role="tabpanel" aria-labelledby="phukien-tab">
                    <div class="row">

                        @foreach($list_phukien as $phukien)
                            @php
                                $gia = number_format($phukien->gia, 0, '', ',');
                                $giaKhuyenMai =  number_format($phukien->giakhuyenmai, 0, '', ',');
                                $phanTramGiam = round(100 - ($phukien->giakhuyenmai / $phukien->gia * 100), PHP_ROUND_HALF_UP);
                            @endphp
                            <div class="col-sm-3">
                                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                                    @if($phukien->giakhuyenmai)
                                        <b class="rounded khuyenmai">- {{$phanTramGiam}} %</b>
                                    @endif
                                    <img src="{{asset('uploads/sanpham/'.$phukien->hinhanh)}}" class="card-img-top" alt="{{ $phukien->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $phukien->name }}</h5>
                                        <p class="card-subtitle">
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

                                        {!! Form::open(['url' => '/save-cart', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                            {!! Form::hidden('productid_hidden', $phukien->id) !!}
                                            {!! Form::hidden('qty', 1) !!}

                                            <input type="submit" value="Buy" class="btn btn-outline-primary">
                                            <a href="{{route('detail',$phukien->slug)}}" class="btn btn-outline-primary">Detail</a>
                                        {!! Form::close() !!}

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
    {{--all_sanpham--}}
<div class="container">
    <div class="row">
        <h3>Tất cả sản phẩm</h3>
        @foreach($list_all_sanpham as $all_sp)
            <div class="col-sm-3">
                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">

                    <a href="{{route('detail',$all_sp->slug)}}" style="text-decoration: none">
                        <img src="{{asset('uploads/sanpham/'.$all_sp->hinhanh)}}" class="card-img-top" alt="{{ $all_sp->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $all_sp->name }}</h5>
                            <p class="card-subtitle">
                                @php
                                    $gia = number_format($all_sp->gia, 0, '', ',');
                                    $giaKhuyenMai =  number_format($all_sp->giakhuyenmai, 0, '', ',');
                                    $phanTramGiam = round(100 - ($all_sp->giakhuyenmai / $all_sp->gia * 100), PHP_ROUND_HALF_UP);
                                @endphp

                                @if($all_sp->soluong)
                                    @if($all_sp->giakhuyenmai)
                                        <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                        <br><b>{{ $giaKhuyenMai }} VND</b>
                                    @else
                                        <b>{{ $gia }} VND</b>
                                    @endif
                                @else
                                    <b style="color: red">Hết Hàng</b>
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        <div class="d-flex">
            {!! $list_all_sanpham->links() !!}
        </div>
    </div>

</div>

@endsection
