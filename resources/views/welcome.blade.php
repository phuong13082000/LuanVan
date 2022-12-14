<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.min.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<style>
    /*khuyenmai_trenphai_image*/
    .khuyenmai {
        background-color: red;
        color: white;
        position: absolute;
        text-align: center;
        width: 30%;
        top: 8px;
        right: 8px;
    }

</style>
<div class="container">

    @yield('index')

    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl-carousel.min.js')}}"></script>

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

    <!--search-->
    <script type="text/javascript">
        $('#keywords').keyup(function () {
            var keywords = $(this).val();
            if (keywords !== '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/timkiem-ajax') }}",
                    method: "POST",
                    data: {keywords: keywords, _token: _token},
                    success: function (data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_search_ajax', function () {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>

    <!--updateprofile-->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#profile_setup_frm").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#btn").attr("disabled", true);
                $("#btn").html("Updating...");
                $.ajax({
                    type: "POST",
                    url: this.action,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response.code == 400) {
                            let error = '<span class="alert alert-danger">' + response.msg + '</span>';
                            $("#res").html(error);
                            $("#btn").attr("disabled", false);
                            $("#btn").html("Save Profile");
                        } else if (response.code == 200) {
                            let success = '<span class="alert alert-success">' + response.msg + '</span>';
                            $("#res").html(success);
                            $("#btn").attr("disabled", false);
                            $("#btn").html("Save Profile");
                        }
                    }
                });
            });
        });
    </script>

</div>

</body>
</html>
