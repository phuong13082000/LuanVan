@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Danh Mục') }}</div>

                <div class="card-body">

                    <div class="mb-3">
                        {{--<a href="{{ route('danhmuc.create') }}" type="button" class="btn btn-primary">Thêm</a>--}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDanhmuc">Thêm</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="tablesanpham">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                            </thead>
                            <tbody class="order_position">
                            @foreach ($list_danhmuc as $key => $danhmuc )
                                <tr id="{{$danhmuc->id}}">
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$danhmuc->name}}</td>
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

    {{--modal them danhmuc--}}
    <div class="modal fade" id="modalDanhmuc" tabindex="-1" aria-labelledby="modalDanhmucLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDanhmucLable">Thêm danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'danhmuc.store', 'method'=>'POST']) !!}

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên danh mục', []) !!}
                            {!! Form::text('name', '', ['class'=>'form-control', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', '', ['class'=>'form-control', 'id'=>'convert_slug']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('kichhoat', 'Trạng thái', []) !!}
                            {!! Form::select('kichhoat', ['0'=>'Hiển thị', '1'=>'Không hiển thị'], '', ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="modal-footer mb-3">
                        {!! Form::submit('Thêm', ['class'=>'btn btn-success']) !!}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
