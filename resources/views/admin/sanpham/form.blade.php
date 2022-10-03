@extends('layouts.app')

@section('content')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 100%;
            margin: 20px auto;
        }
    </style>

    @if(!isset($sanpham))
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản Phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
            </ol>
        </nav>
    @else
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản Phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa Sản Phẩm</li>
            </ol>
        </nav>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Sản Phẩm</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('sanpham.index') }}" type="button" class="btn btn-primary">Trở về</a>
                    </div>

                    @include('admin.include.alert')

                    @if(!isset($sanpham))
                        {!! Form::open(['route'=>'sanpham.store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route'=>['sanpham.update', $sanpham->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                    @endif

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('Hinhanh', 'Hình ảnh', []) !!}
                            {!! Form::file('hinhanh', ['class'=>'form-control-file']) !!}
                            @if(isset($sanpham))
                                <img width="150" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Tên sản phẩm', []) !!}
                            {!! Form::text('name', isset($sanpham) ? $sanpham->name : '', ['class'=>'form-control', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($sanpham) ? $sanpham->slug : '', ['class'=>'form-control', 'id'=>'convert_slug']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Danhmuc', 'Danh mục', []) !!}
                                    {!! Form::select('danhmuc_id', $danhmuc, isset($sanpham) ? $sanpham->danhmuc_id : '', ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Theloai', 'Thể loại', []) !!}
                                    {!! Form::select('theloai_id', $theloai, isset($sanpham) ? $sanpham->theloai_id : '', ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Gia', 'Giá', []) !!}
                                    {!! Form::number('gia', isset($sanpham) ? $sanpham->gia : '', ['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Giakhuyenmai', 'Giá khuyến mãi', []) !!}
                                    {!! Form::number('giakhuyenmai', isset($sanpham) ? $sanpham->giakhuyenmai : '', ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Soluong', 'Số lượng', []) !!}
                                    {!! Form::number('soluong', isset($sanpham) ? $sanpham->soluong : '', ['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('cauhinh', 'Cấu hình', []) !!}
                            {!! Form::textarea('cauhinh', isset($sanpham) ? $sanpham->cauhinh : '', ['class'=>'form-control', 'id'=>'desc_cauhinh']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('noidung', 'Nội dung', []) !!}
                            {!! Form::textarea('noidung', isset($sanpham) ? $sanpham->noidung : '', ['class'=>'form-control', 'id'=>'desc_noidung']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('kichhoat', 'Trạng thái', []) !!}
                            {!! Form::select('kichhoat', ['0'=>'Hiển thị', '1'=>'Không hiển thị'], isset($sanpham) ? $sanpham->kichhoat : '', ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        @if(!isset($sanpham))
                            {!! Form::submit('Thêm Sản Phẩm', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Sản Phẩm', ['class'=>'btn btn-success']) !!}
                        @endif
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

