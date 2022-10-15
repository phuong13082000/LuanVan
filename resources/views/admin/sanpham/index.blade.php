@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sản Phẩm') }}</div>

                <div class="card-body">

                    <div class="mb-3">
                        <a href="{{ route('sanpham.create') }}" type="button" class="btn btn-primary">Thêm</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="tablesanpham">
                            <thead>
                            <tr>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Giá Khuyến Mãi</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <th>Thể Loại</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($list_sanpham as $key => $sanpham )
                                <tr>
                                    <td>
                                        <img width="100px" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}" alt="{{$sanpham->name}}">
                                    </td>
                                    <td>{{$sanpham->name}}</td>
                                    <td>{{ number_format($sanpham->gia, 0, '', ',')}} VND</td>
                                    <td>
                                        {!! Form::open(['method'=>'POST']) !!}
                                            {!! Form::number('giakhuyenmai', isset($sanpham) ? $sanpham->giakhuyenmai : '', ['class'=>'form-control change-giakhuyenmai', 'id'=>$sanpham->id]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'POST']) !!}
                                            {!! Form::number('soluong', isset($sanpham) ? $sanpham->soluong : '', ['class'=>'form-control change-number', 'id'=>$sanpham->id]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td><span class="badge bg-primary">{{$sanpham->danhMuc->name}}</span></td>
                                    <td>
                                        @foreach ($sanpham->ntheLoai as $theloai )
                                            <span class="badge bg-dark">{{$theloai->name}}</span><br>
                                        @endforeach
                                    <td>
                                        @if ($sanpham->kichhoat==0)
                                            <span class="text text-success"><i class="fa fa-thumbs-up"></i></span>
                                        @else
                                            <span class="text text-danger"><i class="fa fa-thumbs-down"></i></span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('sanpham.show',[$sanpham->id])}}" class="btn btn-success"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{route('sanpham.edit',[$sanpham->id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                        <form action="{{route('sanpham.destroy',[$sanpham->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn có muốn xóa danh mục này?');" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
