@extends('welcome')

@section('index')
    @include('pages.nav')
    <section id="cart_items">
        <div class="container">
            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng</p>
                            <div class="form-one">
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

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
