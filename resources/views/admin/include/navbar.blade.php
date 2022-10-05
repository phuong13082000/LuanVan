<div class="container-fluid" >
    <nav class="nav flex-column border-end" style="background-color: #fff;">
        <div class="p-5">
            <h3>Trang Quản Trị</h3>
            <hr>
            <a class="nav-link" aria-current="page" href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a>

            <div class="mt-3">
                <a class="nav-link" href="{{route('danhmuc.index')}}">Danh Mục</a>
            </div>

            <div class="mt-3">
                <a class="nav-link" href="{{route('theloai.index')}}">Thể Loại</a>
            </div>

            <div class="mt-3">
                <a class="nav-link" href="{{route('sanpham.index')}}">Sản Phẩm</a>
            </div>
            <hr>
        </div>
    </nav>
</div>

