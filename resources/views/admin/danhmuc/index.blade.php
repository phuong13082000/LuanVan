@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-3">
                @include('admin.include.navbar')
            </div>

            <div class="col-9">

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Danh Mục') }}</div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <a href="{{ route('danhmuc.create') }}" type="button" class="btn btn-primary">Thêm</a>
                                </div>

                                <div class="table-responsive">
                                    <table id="danhmuc_table" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Danh Mục</th>
                                            <th>Đường dẫn</th>
                                            <th>Kích Hoạt</th>
                                            <th>Quản Lý</th>
                                        </tr>
                                        </thead>
                                        <tbody class="order_position">
                                        @foreach ($list_danhmuc as $key => $danhmuc )
                                            <tr id="{{$danhmuc->id}}">
                                                <th scope="row">{{$key}}</th>
                                                <td>{{$danhmuc->name}}</td>
                                                <td>{{$danhmuc->slug}}</td>
                                                <td>
                                                    @if ($danhmuc->kichhoat==0)
                                                        <span class="text text-success"><i class="fa fa-thumbs-up"></i></span>
                                                    @else
                                                        <span class="text text-danger"><i class="fa fa-thumbs-down"></i></span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{route('danhmuc.edit',[$danhmuc->id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                                    <form action="{{route('danhmuc.destroy',[$danhmuc->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button onclick="return confirm('Bạn có muốn xóa danh mục này?');" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</button>
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
            </div>
        </div>
    </div>
@endsection
