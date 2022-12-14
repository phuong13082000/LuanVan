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
		<h1 style="text-align: center">Ho?? ????n</h1>
		<p>Ng?????i ?????t</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>T??n kh??ch ?????t</th>
						<th>S??? ??i???n tho???i</th>
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

		<p>Ship h??ng t???i</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>T??n ng?????i nh???n</th>
						<th>?????a ch???</th>
						<th>Sdt</th>
						<th>Email</th>
						<th>Ghi ch??</th>
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

		<p>????n h??ng ?????t</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>T??n s???n ph???m</th>
						<th>S??? l?????ng</th>
						<th>Gi?? s???n ph???m</th>
						<th>Th??nh ti???n</th>
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
						<td>' . number_format($product->sanpham_gia, 0, ',', '.') . '??' . '</td>
						<td>' . number_format($subtotal, 0, ',', '.') . '??' . '</td>

					</tr>
					<tr>
                        <td colspan="2">
                            <p>Ph?? ship: 50,000 ??</p>
                            <p>Thanh to??n : ' . number_format($total + 50000, 0, ',', '.') . '??' . '</p>
                        </td>
		            </tr>
				</tbody>
		    </table>

		    <p>K?? t??n</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Ng?????i l???p phi???u</th>
						<th width="800px">Ng?????i nh???n</th>

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
