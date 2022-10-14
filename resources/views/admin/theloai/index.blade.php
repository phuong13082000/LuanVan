@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thể Loại</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Thể Loại') }}</div>

                <div class="card-body">

                    <div class="mb-3">
                        {{--<a href="{{ route('theloai.create') }}" type="button" class="btn btn-primary">Thêm</a>--}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTheloai">Thêm</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="tablesanpham">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Thể Loại</th>
                                <th>Kích Hoạt</th>
                                <th>Quản Lý</th>
                            </tr>
                            </thead>
                            <tbody class="order_position">
                            @foreach ($list_theloai as $key => $theloai )
                                <tr id="{{$theloai->id}}">
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$theloai->name}}</td>
                                    <td>
                                        @if ($theloai->kichhoat==0)
                                            <span class="text text-success"><i class="fa fa-thumbs-up"></i></span>
                                        @else
                                            <span class="text text-danger"><i class="fa fa-thumbs-down"></i></span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('theloai.edit',[$theloai->id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Sửa</a>

                                        <form action="{{route('theloai.destroy',[$theloai->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn có muốn xóa thể loại này?');" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa
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

    {{--modal them theloai--}}
    <div class="modal fade" id="modalTheloai" tabindex="-1" aria-labelledby="modalTheloaiLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTheloaiLable">Thêm thể loại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route'=>'theloai.store', 'method'=>'POST']) !!}

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên thể loại', []) !!}
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

