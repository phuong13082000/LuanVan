<!--Carousel-danhmuc-->
<div class="container">
    <div class="mt-3">
        <b>DANH MỤC</b>
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
        <b>THỂ LOẠI</b>
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
