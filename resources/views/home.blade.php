@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tổng danh mục</div>
                <div class="card-body">{{ $count_danhmuc }}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tổng thể loại</div>
                <div class="card-body">{{ $count_theloai }}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tổng sản phẩm</div>
                <div class="card-body">{{ $count_sanpham }}</div>
            </div>
        </div>

    </div>

    <div class="mt-3">
        <div class="row justify-content-center">
            @foreach($soluong_chitiet_sanpham as $chitiet_sp)
                <hr>
                <div class="col-sm-12 mb-3">
                    <img width="150px" height="100px" src="{{asset('uploads/sanpham/'.$chitiet_sp->hinhanh)}}" alt="{{$chitiet_sp->name}}">
                    <span>{{$chitiet_sp->name}}</span> - <span style="font-weight: bold">Số lượng: {{$chitiet_sp->soluong}}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
