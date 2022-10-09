<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show_cart()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.cart')->with(compact('list_danhmuc', 'list_theloai'));
    }

    public function save_cart(Request $request){
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $sanpham_id = $request->productid_hidden;
        $soluong = $request->qty;
        $chitiet_sanpham = SanPham::where('id', $sanpham_id)->first();

        $data['id'] = $sanpham_id;
        $data['qty'] = $soluong;
        $data['name'] = $chitiet_sanpham->name;
        $data['price'] = $chitiet_sanpham->gia;
        $data['weight'] = $chitiet_sanpham->gia;
        $data['options']['image'] = $chitiet_sanpham->hinhanh;

        Cart::add($data);

        return view('pages.cart')->with(compact('list_danhmuc', 'list_theloai'));
    }

    //public function update_cart(Request $request)
    //{
    //    $data = $request->all();
    //
    //    $cart = Session::get('cart');
    //    if ($cart == true) {
    //        foreach ($data['cart_soluong'] as $key => $qty) {
    //            foreach ($cart as $session => $val) {
    //                if ($val['session_id'] == $key) {
    //                    $cart[$session]['soluong'] = $qty;
    //                }
    //            }
    //        }
    //        Session::put('cart', $cart);
    //        return redirect()->back()->with('message', 'Cập nhật số lượng thành công');
    //    } else {
    //        return redirect()->back()->with('message', 'Cập nhật số lượng thất bại');
    //    }
    //}

    public function delete_product($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');

        }else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }

    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);

        return redirect('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId,$qty);
        return redirect('/show-cart');
    }
}
