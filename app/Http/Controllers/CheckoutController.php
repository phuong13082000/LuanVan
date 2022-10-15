<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function confirm_order(Request $request)
    {
        $data = $request->all();

        //shipping
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_diachi = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_phuongthuc = $data['shipping_method'];

        $shipping->save();

        $shipping_id = $shipping->id;
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);

        //order
        $order = new Order;
        $order->user_id = Session::get('id');
        $order->shipping_id = $shipping_id;
        $order->status = 1;
        $order->code_order = $checkout_code;
        $order->huybo = 0;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();

        $order->save();

        //order_details
        $content = Cart::content();
        foreach ($content as $cart) {
            $order_details = new Order_Detail();
            $order_details->order_code = $checkout_code;
            $order_details->sanpham_id = $cart->id;
            $order_details->sanpham_name = $cart->name;
            $order_details->sanpham_gia = $cart->price;
            $order_details->sanpham_soluong = $cart->qty;

            $order_details->save();
        }
        Cart::destroy();
        return redirect('/');
    }

}
