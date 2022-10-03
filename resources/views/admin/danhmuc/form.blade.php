@extends('layouts.app')

@section('content')

    @if(!isset($danhmuc))
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('danhmuc.index') }}">Danh Mục</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm Danh Mục</li>
            </ol>
        </nav>
    @else
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('danhmuc.index') }}">Danh Mục</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa Danh Mục</li>
            </ol>
        </nav>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Danh Mục</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('danhmuc.index') }}" type="button" class="btn btn-primary">Trở về</a>
                    </div>

                    @include('admin.include.alert')

                    @if(!isset($danhmuc))
                        {!! Form::open(['route'=>'danhmuc.store', 'method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['danhmuc.update', $danhmuc->id], 'method'=>'PUT']) !!}
                    @endif

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên danh mục', []) !!}
                            {!! Form::text('name', isset($danhmuc) ? $danhmuc->name : '', ['class'=>'form-control', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($danhmuc) ? $danhmuc->slug : '', ['class'=>'form-control', 'id'=>'convert_slug']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('kichhoat', 'Trạng thái', []) !!}
                            {!! Form::select('kichhoat', ['0'=>'Hiển thị', '1'=>'Không hiển thị'], isset($danhmuc) ? $danhmuc->kichhoat : '', ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        @if(!isset($danhmuc))
                            {!! Form::submit('Thêm Danh Mục', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Danh Mục', ['class'=>'btn btn-success']) !!}
                        @endif
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

