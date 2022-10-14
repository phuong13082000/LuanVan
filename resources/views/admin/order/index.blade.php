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
                                <th>Người mua</th>
                                <th>Người nhận</th>
                                <th>Trạng thái</th>
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
                                    <td>
                                        @if($order->status==1)
                                            Đơn hàng mới
                                        @else
                                            Đã xử lý
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->huybo==0)
                                            Chưa hủy
                                        @else
                                            Đã huỷ
                                        @endif
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->updated_at}}</td>
                                    <td>
                                        <a href="{{url('/order-detail/'.$order->code_order)}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>

                                        <form action="{{url('/delete-order/'.$order->code_order)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?');" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</button>
                                        </form>

                                    </td>

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
