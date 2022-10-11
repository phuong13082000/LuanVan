<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DanhMuc;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Shipping;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;

session_start();

class CheckoutController extends Controller
{
    public function checkout()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.checkout')->with(compact('list_danhmuc', 'list_theloai'));
    }

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
        //$order->customer_id = Session::get('customer_id');
        $order->customer_id = 1;
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

    }

    public function dangnhap()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.login')->with(compact('list_danhmuc', 'list_theloai'));
    }

    public function logout_customer()
    {
        Session::forget('customer_id');
        return redirect('/');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = Customer::where('customer_email', $email)
            ->where('customer_password', $password)
            ->first();

        if ($result) {
            Session::put('customer_id', $result->id);
            return redirect('/');
        } else {
            return redirect('/dang-nhap');
        }
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = Customer::insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return redirect('/');

    }
}
