@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản Phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $sanpham->name }}</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $sanpham->name }}</div>
                <div class="card-body">

                    <div class="mb-3">
                        Hình ảnh:
                        <img width="50%" height="50%" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}"
                             alt="{{$sanpham->name}}">
                    </div>
                    <div class="mb-3">Tên: {{$sanpham->name}}</div>
                    <div class="mb-3">Slug: {{$sanpham->slug}}</div>
                    <div class="mb-3">Giá: {{ number_format($sanpham->gia, 0, '', ',')}} VND</div>
                    <div class="mb-3">Giá khuyến mãi: {{ number_format($sanpham->giakhuyenmai, 0, '', ',')}} VND</div>
                    <div class="mb-3">Số lượng: {{$sanpham->soluong}}</div>
                    <div class="mb-3">Danh mục: {{$sanpham->danhMuc->name}}</div>
                    <div class="mb-3">Thể loại:
                        @foreach ($sanpham->ntheLoai as $theloai )
                            <span>{{$theloai->name}}</span>,
                        @endforeach
                    </div>
                    <div class="mb-3">Cấu hình: {!! $sanpham->cauhinh !!}</div>
                    <div class="mb-3">Nội dung: {!! $sanpham->noidung !!}</div>

                </div>
            </div>
        </div>
    </div>

@endsection
