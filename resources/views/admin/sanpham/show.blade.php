@extends('layouts.app')

@section('content')
    <nav
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
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
                    <div class="mb-3">Thể loại: {{$sanpham->theLoai->name}}</div>
                    <div class="mb-3">Nội dung: {!! $sanpham->noidung !!}</div>

                </div>
            </div>
        </div>
    </div>

@endsection
