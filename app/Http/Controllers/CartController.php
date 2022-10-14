<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show_cart()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.cart')->with(compact('list_danhmuc', 'list_theloai'));
    }

    public function save_cart(Request $request, FlasherInterface $flasher){
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $sanpham_id = $request->productid_hidden;
        $chitiet_sanpham = SanPham::where('id', $sanpham_id)->first();
        $soluong = $request->qty;

        $data['id'] = $sanpham_id;
        $data['qty'] = $soluong; //số lượng chọn
        $data['name'] = $chitiet_sanpham->name;
        $data['price'] = $chitiet_sanpham->giakhuyenmai ?: $chitiet_sanpham->gia;
        $data['weight'] = $chitiet_sanpham->soluong; //soluong tổng
        $data['options']['image'] = $chitiet_sanpham->hinhanh;

        Cart::add($data);

        $flasher->addSuccess('Đã thêm vào giỏ hàng!');
        return view('pages.cart')->with(compact('list_danhmuc', 'list_theloai'));
    }

    public function delete_to_cart($rowId, FlasherInterface $flasher){
        Cart::update($rowId,0);

        $flasher->addSuccess('Đã xóa sản phẩm trong giỏ hàng!');
        return redirect('/show-cart');
    }

    public function update_cart_quantity(Request $request, FlasherInterface $flasher){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId,$qty);

        $flasher->addSuccess('Đã thêm vào giỏ hàng!');
        return redirect('/show-cart');
    }
}
