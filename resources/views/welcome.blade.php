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
<div class="container">

    @yield('index')

    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl-carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
            integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

    <!--shipping-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.send_order').click(function () {
                var shipping_email = $('.shipping_email').val();
                var shipping_name = $('.shipping_name').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_notes = $('.shipping_notes').val();
                var shipping_method = $('.payment_select').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{url('/confirm-order')}}',
                    method: 'POST',
                    data: {
                        shipping_email: shipping_email,
                        shipping_name: shipping_name,
                        shipping_address: shipping_address,
                        shipping_phone: shipping_phone,
                        shipping_notes: shipping_notes,
                        shipping_method: shipping_method,
                        _token: _token
                    },
                });
                window.setTimeout(function () {
                    location.reload();
                    window.location.href = "{{url('/')}}";
                }, 3000);
            });
        });
    </script>

</div>

</body>
</html>
