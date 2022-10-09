@extends('layouts.app')

@section('content')
    @if(!isset($sanpham))
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản Phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
            </ol>
        </nav>
    @else
        <nav aria-label="breadcrumb">
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
                        @if(!isset($sanpham))
                            {!! Form::submit('Thêm Sản Phẩm', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Sản Phẩm', ['class'=>'btn btn-success']) !!}
                        @endif
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('Hinhanh', 'Hình ảnh', []) !!}
                            {!! Form::file('hinhanh', ['class'=>'form-control']) !!}
                            @if(isset($sanpham))
                                <img width="150" src="{{asset('uploads/sanpham/'.$sanpham->hinhanh)}}"
                                     alt="{{$sanpham->name}}">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Tên sản phẩm', []) !!}
                                    {!! Form::text('name', isset($sanpham) ? $sanpham->name : '', ['class'=>'form-control', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        {!! Form::label('slug', 'Đường dẫn', []) !!}
                                        {!! Form::text('slug', isset($sanpham) ? $sanpham->slug : '', ['class'=>'form-control', 'id'=>'convert_slug']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        {!! Form::label('Danhmuc', 'Danh mục', ['class'=>'input-group-text', 'for'=>'inputGroupSelect01']) !!}
                                        {!! Form::select('danhmuc_id', $danhmuc, isset($sanpham) ? $sanpham->danhmuc_id : '', ['class'=>'form-select' ,'id'=>'inputGroupSelect01']) !!}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        {!! Form::label('Gia', 'Giá', []) !!}
                                        {!! Form::number('gia', isset($sanpham) ? $sanpham->gia : '', ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        {!! Form::label('Giakhuyenmai', 'Giá khuyến mãi', []) !!}
                                        {!! Form::number('giakhuyenmai', isset($sanpham) ? $sanpham->giakhuyenmai : 0, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        {!! Form::label('Soluong', 'Số lượng', []) !!}
                                        {!! Form::number('soluong', isset($sanpham) ? $sanpham->soluong : '', ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Theloai', 'Thể loại', []) !!}
                                    <div class="row">
                                        @foreach ($list_theloai as $ntheloai )
                                            <div class="col-sm-4">
                                            @if (isset($sanpham))
                                                {!! Form::checkbox('theloai[]', $ntheloai->id, isset($sanpham_theloai) && $sanpham_theloai->contains($ntheloai->id) ? true : false) !!}
                                            @else
                                                {!! Form::checkbox('theloai[]', $ntheloai->id, '') !!}
                                            @endif
                                            {!! Form::label('theloai', $ntheloai->name) !!}
                                            </div>
                                        @endforeach
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

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection

