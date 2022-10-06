<?php

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('danhmuc', DanhMucController::class);
Route::resource('theloai', TheLoaiController::class);
Route::resource('sanpham', SanPhamController::class);
