@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Order') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablesanpham">
                            <thead>
                            <tr>
                                <th>Customer_id</th>
                                <th>Tên</th>
                                <th>Status</th>
                                <th>Code_order</th>
                                <th>HuyBo</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Quản Lý</th>
                            </tr>
                            </thead>
                            <tbody class="order_position">
                            @foreach ($list_order as $order )
                                <tr>
                                    <td>{{$order->customer_id}}</td>
                                    <td>{{$order->shipping->shipping_name}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->code_order}}</td>
                                    <td>{{$order->huybo}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->updated_at}}</td>
                                    <td></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
