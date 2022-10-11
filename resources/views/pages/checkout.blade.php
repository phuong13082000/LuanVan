@extends('welcome')

@section('index')
    @include('pages.nav')
    <div class="container">
        <div class="mt-3">
            <p>Điền thông tin gửi hàng</p>
        </div>

        <form method="POST">
            @csrf
            <div class="mt-3">
                <label>Email: <br>
                    <input type="email" name="shipping_email" class="shipping_email">
                </label>
            </div>

            <div class="mt-3">
                <label>Họ tên: <br>
                    <input type="text" name="shipping_name" class="shipping_name">
                </label>
            </div>

            <div class="mt-3">
                <label>Địa chỉ: <br>
                    <input type="text" name="shipping_address" class="shipping_address">
                </label>
            </div>

            <div class="mt-3">
                <label>Số điện thoại: <br>
                    <input type="number" name="shipping_phone" class="shipping_phone">
                </label>
            </div>

            <div class="mt-3">
                <label>Ghi chú: <br>
                    <textarea name="shipping_notes" class="shipping_notes" rows="5"></textarea>
                </label>
            </div>

            <div class="mt-3">
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn hình thức thanh toán
                        <select name="payment_select"
                                class="form-control input-sm m-bot15 payment_select">
                            <option value="0">Qua chuyển khoản</option>
                            <option value="1">Tiền mặt</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="mt-3">
                <input type="button" value="Xác nhận đơn hàng" name="send_order"
                       class="btn btn-primary btn-sm send_order">
            </div>
        </form>
    </div>

@endsection
