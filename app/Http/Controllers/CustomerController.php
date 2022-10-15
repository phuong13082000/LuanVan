<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DanhMuc;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

session_start();

class CustomerController extends Controller
{
    public function dangnhap()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.login')->with(compact('list_danhmuc', 'list_theloai'));
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $user = User::where('email', $email)->first();

        $check_password = Hash::check($request->password_account, $user->password);

        if ($user && $check_password) {
            Session::put('id', $user->id);
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            Session::put('address', $user->address);
            Session::put('phone', $user->phone);

            return redirect('/show-cart');
        } else {
            return redirect('/');
        }
    }

    public function add_customer(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        User::create([
            'name' => $data['customer_name'],
            'phone' => $data['customer_phone'],
            'address' => $data['customer_address'],
            'email' => $data['customer_email'],
            'password' => Hash::make($data['customer_password']),
        ]);

        $user = User::where('email', $data['customer_email'])->first();

        Session::put('id', $user->id);
        Session::put('name', $user->name);
        Session::put('email', $user->email);
        Session::put('address', $user->address);
        Session::put('phone', $user->phone);
        return redirect()->back();
    }

    public function updateProfile(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if ($validated->fails()) {
            return response()->json(['code' => 400, 'msg' => $validated->errors()->first()]);
        }

        $user = User::find($request['id']);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->save();

        Session::put('id', $user->id);
        Session::put('name', $user->name);
        Session::put('email', $user->email);
        Session::put('address', $user->address);
        Session::put('phone', $user->phone);
        return response()->json(['code' => 200, 'msg' => 'profile updated successfully.']);

    }
}
