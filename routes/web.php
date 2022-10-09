<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TheLoaiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/dtdd/detail/{slug}', [IndexController::class, 'detail'])->name('detail');
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai'])->name('genre');

//Cart
Route::post('/update-cart-quantity',[CartController::class, 'update_cart_quantity']);
//Route::post('/update-cart',[CartController::class, 'update_cart']);
Route::post('/save-cart',[CartController::class, 'save_cart']);
Route::post('/add-cart-ajax',[CartController::class, 'add_cart_ajax']);
Route::get('/show-cart',[CartController::class, 'show_cart']);
Route::get('/gio-hang',[CartController::class, 'gio_hang']);
Route::get('/delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart']);
Route::get('/del-product/{session_id}',[CartController::class, 'delete_product']);
Route::get('/del-all-product',[CartController::class, 'delete_all_product']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('danhmuc', DanhMucController::class);
Route::resource('theloai', TheLoaiController::class);
Route::resource('sanpham', SanPhamController::class);
