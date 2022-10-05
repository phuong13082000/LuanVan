<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
<div class="container">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">ĐTDĐ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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

    <!--Carousel-danhmuc-->
    <div class="container">
        <div class="mt-3">
            <b>Danh Mục</b>
            <div class="owl-carousel owl-theme">
                @foreach ($list_danhmuc as $danhmuc)
                    <div class="item">
                        <div class="card text-center">
                            <div class="card-body">
                                <b>{{ $danhmuc->name }}</b>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--Carousel-theloai-->
    <div class="container">
        <div class="mt-3">
            <b>Thể loại</b>
            <div class="owl-carousel owl-theme">
                @foreach ($list_theloai as $theloai)
                    <div class="item">
                        <div class="card text-center">
                            <div class="card-body">
                                <b>{{ $theloai->name }}</b>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--Tabs-->
    <div class="container">
        <div class="mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="sanphammoi-tab" data-bs-toggle="tab" data-bs-target="#sanphammoi" type="button" role="tab" aria-controls="sanphammoi" aria-selected="true">Sản Phẩm Mới Nhất
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sanphamkhuyenmai-tab" data-bs-toggle="tab" data-bs-target="#sanphamkhuyenmai" type="button" role="tab" aria-controls="sanphamkhuyenmai" aria-selected="false">Sản Phẩm Khuyến Mãi
                    </button>
                </li>
            </ul>
            <div class="mt-3">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sanphammoi" role="tabpanel" aria-labelledby="sanphammoi-tab">
                        <div class="row">

                            @foreach($list_sanpham_moi as $sanpham_moi)
                                <div class="col-sm-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{asset('uploads/sanpham/'.$sanpham_moi->hinhanh)}}" class="card-img-top" alt="{{ $sanpham_moi->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $sanpham_moi->name }}</h5>
                                            <p class="card-subtitle">
                                                @if($sanpham_moi->giakhuyenmai)
                                                    @php
                                                        $gia = number_format($sanpham_moi->gia, 0, '', ',');
                                                        $giaGiam = number_format($sanpham_moi->giakhuyenmai, 0, '', ',');
                                                        $phanTramGiam = round(100 - ($sanpham_moi->giakhuyenmai / $sanpham_moi->gia * 100), PHP_ROUND_HALF_UP); //PHP_ROUND_HALF_UP làm tròn 1,5->2
                                                    @endphp
                                                    <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                                    <br><b>{{ $giaGiam }} VND</b>
                                                @else
                                                    <b>{{ $gia }} VND</b>
                                                @endif
                                            </p>
                                            <p class="card-text">{!! $sanpham_moi->cauhinh !!}</p>

                                            <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="#" class="btn btn-outline-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="tab-pane fade" id="sanphamkhuyenmai" role="tabpanel" aria-labelledby="sanphamkhuyenmai-tab">
                        <div class="row">

                            @foreach($list_sanpham_khuyenmai as $sanpham_khuyenmai)
                                <div class="col-sm-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{asset('uploads/sanpham/'.$sanpham_khuyenmai->hinhanh)}}" class="card-img-top" alt="{{ $sanpham_khuyenmai->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $sanpham_khuyenmai->name }}</h5>
                                            <p class="card-subtitle">
                                                @if($sanpham_khuyenmai->giakhuyenmai)
                                                    @php
                                                        $gia = number_format($sanpham_khuyenmai->gia, 0, '', ',');
                                                        $giaKhuyenMai =  number_format($sanpham_khuyenmai->giakhuyenmai, 0, '', ',');
                                                        $phanTramGiam = round(100 - ($sanpham_khuyenmai->giakhuyenmai / $sanpham_khuyenmai->gia * 100), PHP_ROUND_HALF_UP);
                                                    @endphp
                                                    <del>{{ $gia }} VND</del><b style="color: red"> -{{ $phanTramGiam }}%</b>
                                                    <br><b>{{ $giaKhuyenMai }} VND</b>
                                                @else
                                                    <b>{{ $gia }} VND</b>
                                                @endif
                                            </p>
                                            <p class="card-text">{!! $sanpham_khuyenmai->cauhinh !!}</p>

                                            <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="#" class="btn btn-outline-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--script-owl-carousel-->
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            //nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

</div>

</body>
</html>
