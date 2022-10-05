@extends('layouts.app')

@section('content')
    @if(!isset($theloai))
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('theloai.index') }}">Thể Loại</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm Thể Loại</li>
            </ol>
        </nav>
    @else
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('theloai.index') }}">Thể Loại</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa Thể Loại</li>
            </ol>
        </nav>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Thể Loại</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('theloai.index') }}" type="button" class="btn btn-primary">Trở về</a>
                    </div>

                    @include('admin.include.alert')

                    @if(!isset($theloai))
                        {!! Form::open(['route'=>'theloai.store', 'method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['theloai.update', $theloai->id], 'method'=>'PUT']) !!}
                    @endif

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên thể loại', []) !!}
                            {!! Form::text('name', isset($theloai) ? $theloai->name : '', ['class'=>'form-control', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($theloai) ? $theloai->slug : '', ['class'=>'form-control', 'id'=>'convert_slug']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('kichhoat', 'Trạng thái', []) !!}
                            {!! Form::select('kichhoat', ['0'=>'Hiển thị', '1'=>'Không hiển thị'], isset($theloai) ? $theloai->kichhoat : '', ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        @if(!isset($theloai))
                            {!! Form::submit('Thêm Thể Loại', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Thể Loại', ['class'=>'btn btn-success']) !!}
                        @endif
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

