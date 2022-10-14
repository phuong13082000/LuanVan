@extends('welcome')

@section('index')
    @include('pages.nav')
    <div class="mt-3">
        <div class="container">
            <table class="table">
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
                <tr>
                    <th>{{$user->customer_name}}</th>
                    <th>{{$user->customer_email}}</th>
                    <th>{{$user->customer_phone}}</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
