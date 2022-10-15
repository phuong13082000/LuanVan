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


@endsection
