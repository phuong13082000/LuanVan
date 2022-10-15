<!--Navbar-->
<div class="container">
    <nav class="nav navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh Mục</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($list_danhmuc as $danhmuc)
                                <li><a class="dropdown-item" href="{{ route('category', $danhmuc->slug) }}">{{ $danhmuc->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể Loại</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($list_theloai as $theloai)
                                <li><a class="dropdown-item" href="{{ route('genre', $theloai->slug) }}">{{ $theloai->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/show-cart')}}"><i class="fa fa-shopping-cart" style="color: red">{{Cart::count()}}</i> Giỏ Hàng</a>
                    </li>
                    @php
                        $id = Session::get('id');
                        $name = Session::get('name');
                    @endphp
                    @if (!$id)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dang-nhap') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Session::get('name') }}</a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('profile/'.$id) }}" >{{ __('Profile') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>

                {{--Search--}}
                <form class="form-floating d-flex" action="{{ url('tim-kiem') }}" method="POST" autocomplete="off">
                    @csrf
                    <input class="form-control me-2" type="search" id="keywords" name="tukhoa" aria-label="Search" placeholder="Tìm kiếm theo tên">
                    <label for="keywords">Tìm kiếm theo tên</label>

                    <div id="search_ajax"></div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
    </nav>
</div>
