<!--Navbar-->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">ĐTDĐ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh Mục</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($list_danhmuc as $danhmuc)
                                <li><a class="dropdown-item" href="#">{{ $danhmuc->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể Loại</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($list_theloai as $theloai)
                                <li><a class="dropdown-item" href="#">{{ $theloai->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><i class="fa fa-user"></i> Tài Khoản</a>
                    </li>
                </ul>

                <!--Search-->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</div>
