<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Support\Facades\App;


class OrderController extends Controller
{
    public function view_order()
    {
        $list_order = Order::with('shipping')->orderBy('created_at', 'DESC')->get();

        return view('admin.order.index')->with(compact('list_order'));
    }

    public function view_order_detail($order_code)
    {
        $order_details = Order_Detail::with('sanPham')->where('order_code', $order_code)->get();

        $orders = Order::where('code_order', $order_code)->get();
        foreach ($orders as $order) {
            $user_id = $order->user_id;
            $shipping_id = $order->shipping_id;
            $order_status = $order->status;
        }
        $customer = User::where('id', $user_id)->first();
        $shipping = Shipping::where('id', $shipping_id)->first();

        return view('admin.order.orderDetail')->with(compact('order_details', 'customer', 'shipping', 'order_details', 'orders', 'order_status'));
    }

    public function delete_order($order_code)
    {

    }

    public function print_order($checkout_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }

    public function print_order_convert($checkout_code)
    {
        $orders = Order::where('code_order', $checkout_code)->get();

        foreach ($orders as $order) {
            $customer_id = $order->user_id;
            $shipping_id = $order->shipping_id;
        }

        $customer = User::where('id', $customer_id)->first();
        $shipping = Shipping::where('id', $shipping_id)->first();

        $order_details_product = Order_Detail::with('sanPham')->where('order_code', $checkout_code)->get();

        $output = '
        <style>
            body{font-family: DejaVu Sans, serif; }
            .table-styling{border:1px solid #000; }
            .table-styling tbody tr td{border:1px solid #000; }
		</style>
		<h1 style="text-align: center">Hoá đơn</h1>
		<p>Người đặt</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên khách đặt</th>
						<th>Số điện thoại</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>' . $customer->name . '</td>
						<td>' . $customer->phone . '</td>
						<td>' . $customer->email . '</td>
					</tr>
				</tbody>
		</table>

		<p>Ship hàng tới</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên người nhận</th>
						<th>Địa chỉ</th>
						<th>Sdt</th>
						<th>Email</th>
						<th>Ghi chú</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>' . $shipping->shipping_name . '</td>
						<td>' . $shipping->shipping_diachi . '</td>
						<td>' . $shipping->shipping_phone . '</td>
						<td>' . $shipping->shipping_email . '</td>
						<td>' . $shipping->shipping_notes . '</td>
					</tr>
				</tbody>
		    </table>

		<p>Đơn hàng đặt</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá sản phẩm</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>';

        $total = 0;

        foreach ($order_details_product as $product) {
            $subtotal = $product->sanpham_gia * $product->sanpham_soluong;
            $total += $subtotal;

            $output .= '
					<tr>
						<td>' . $product->sanpham_name . '</td>
						<td>' . $product->sanpham_soluong . '</td>
						<td>' . number_format($product->sanpham_gia, 0, ',', '.') . 'đ' . '</td>
						<td>' . number_format($subtotal, 0, ',', '.') . 'đ' . '</td>

					</tr>
					<tr>
                        <td colspan="2">
                            <p>Phí ship: 50,000 đ</p>
                            <p>Thanh toán : ' . number_format($total + 50000, 0, ',', '.') . 'đ' . '</p>
                        </td>
		            </tr>
				</tbody>
		    </table>

		    <p>Ký tên</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Người lập phiếu</th>
						<th width="800px">Người nhận</th>

					</tr>
				</thead>
				<tbody>
				</tbody>
		</table>

		';

        }
        return $output;
    }
}
