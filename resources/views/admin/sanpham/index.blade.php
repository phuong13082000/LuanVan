@extends('layouts.app')

@section('content')
    <nav
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
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
                        <table class="table table-bordered" id="tablesanpham">
                            <thead>
                            <tr>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Đường dẫn</th>
                                <th>Giá</th>
                                <th>Giá Khuyến mãi</th>
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
                                        <img width="100px" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}"
                                             alt="{{$sanpham->name}}">
                                    </td>
                                    <td>{{$sanpham->name}}</td>
                                    <td>{{$sanpham->slug}}</td>
                                    <td>{{ number_format($sanpham->gia, 0, '', ',')}} VND</td>
                                    <td>{{ number_format($sanpham->giakhuyenmai, 0, '', ',')}} VND</td>
                                    <td>{{$sanpham->soluong}}</td>
                                    <td>{{$sanpham->danhMuc->name}}</td>
                                    <td>{{$sanpham->theLoai->name}}</td>
                                    <td>
                                        @if ($sanpham->kichhoat==0)
                                            <span class="text text-success"><i class="fa fa-thumbs-up"></i></span>
                                        @else
                                            <span class="text text-danger"><i class="fa fa-thumbs-down"></i></span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('sanpham.show',[$sanpham->id])}}" class="btn btn-success"><i
                                                class="fa fa-eye"></i> View</a>

                                        <a href="{{route('sanpham.edit',[$sanpham->id])}}" class="btn btn-primary"><i
                                                class="fa fa-pencil-square-o"></i> Edit</a>

                                        <form action="{{route('sanpham.destroy',[$sanpham->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn có muốn xóa danh mục này?');"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i> Xóa
                                            </button>
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
