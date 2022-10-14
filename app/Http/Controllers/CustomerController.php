<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DanhMuc;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
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
        $result = Customer::where('customer_email', $email)->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->id);
            Session::put('customer_email', $result->customer_email);
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_phone', $result->customer_phone);
            return redirect('/');
        } else {
            return redirect('/');
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
        Session::put('customer_email', $request->customer_email);
        Session::put('customer_phone', $request->customer_phone);
        return redirect()->back();

    }
}
