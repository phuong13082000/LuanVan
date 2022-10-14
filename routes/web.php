<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TheLoaiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/dtdd/detail/{slug}', [IndexController::class, 'detail'])->name('detail');
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai'])->name('genre');
Route::get('/profile/{id}', [IndexController::class, 'profile']);
Route::post('/tim-kiem', [IndexController::class, 'timkiem']);
Route::post('/timkiem-ajax', [IndexController::class, 'timkiem_ajax']);

//Cart
Route::post('/update-cart-quantity',[CartController::class, 'update_cart_quantity']);
Route::post('/save-cart',[CartController::class, 'save_cart']);
Route::post('/add-cart-ajax',[CartController::class, 'add_cart_ajax']);
Route::get('/show-cart',[CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart']);

//Checkout
Route::post('/confirm-order',[CheckoutController::class, 'confirm_order']);

//Customer
Route::get('/logout-customer',[CustomerController::class, 'logout_customer']);
Route::post('/login-customer',[CustomerController::class, 'login_customer']);
Route::post('/add-customer',[CustomerController::class, 'add_customer']);
Route::get('/dang-nhap',[CustomerController::class, 'dangnhap']);

Auth::routes();

//Admin
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('danhmuc', DanhMucController::class);
Route::resource('theloai', TheLoaiController::class);
Route::resource('sanpham', SanPhamController::class);
Route::get('/order', [OrderController::class, 'view_order']);
Route::get('/order-detail/{order_code}', [OrderController::class, 'view_order_detail']);
Route::get('/delete-order/{order_code}', [OrderController::class, 'delete_order']);
