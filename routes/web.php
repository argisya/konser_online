<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('user/index');
});

// user konser transaksi
Route::get('/user/konser/transaksi/{id}', [KonserController::class, 'transaksi'])->name('user.konser.transaksi');
Route::post('/user/pembayaranProcess', [KonserController::class, 'pembayaran'])->name('user.konser.pembayaranProcess');
Route::get('/user/konser/struk/{order_id}', [KonserController::class, 'struk'])->name('user.konser.struk');
Route::get('/user/konser/qris/{order_id}', [KonserController::class, 'qris'])->name('user.konser.qris');

// user konser
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/konser', [KonserController::class, 'index'])->name('user.konser.index');
Route::get('/user/konser/detail/{id}', [KonserController::class, 'detail'])->name('user.konser.detail');

//use cetak pdf
Route::get('/user/konser/pdf/{order_id}', [KonserController::class, 'stream'])->name('user.konser.pdf');

// admin dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');


// user login
Route::get('/user/login', [UserController::class, 'login'])->name('user.login.index');
Route::post('/user/loginProcess', [UserController::class, 'loginProcess'])->name('user.login.loginProcess');

// user register
Route::get('/user/register', [UserController::class, 'register'])->name('user.login.register');
Route::post('/user/registerProcess', [UserController::class, 'registerProcess'])->name('user.login.registerProcess');

// user logout
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.login.logout');