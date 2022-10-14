<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Shipping;

session_start();

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
            $customer_id = $order->customer_id;
            $shipping_id = $order->shipping_id;
            $order_status = $order->status;
        }
        $customer = Customer::where('id', $customer_id)->first();
        $shipping = Shipping::where('id', $shipping_id)->first();

        return view('admin.order.orderDetail')->with(compact('order_details', 'customer', 'shipping', 'order_details', 'orders', 'order_status'));
    }

    public function delete_order($order_code)
    {

    }

}
