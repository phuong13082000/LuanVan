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
            <div class="table-responsive">
                <table class="table table-striped" id="tablesanpham">
                    <thead>
                    <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số lượng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($soluong_chitiet_sanpham as $sanpham )
                        <tr>
                            <td>
                                <img width="100px" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}" alt="{{$sanpham->name}}">
                            </td>
                            <td>{{$sanpham->name}}</td>
                            <td>{{$sanpham->soluong ?  : 'Hết hàng' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
