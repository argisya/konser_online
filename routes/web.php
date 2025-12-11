<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKonserController;

Route::get('/', function () {
    return view('user.index');
});

// user konser transaksi
Route::get('/user/konser/transaksi/{id}', [KonserController::class, 'transaksi'])->name('user.konser.transaksi');
Route::post('/user/pembayaranProcess', [KonserController::class, 'pembayaran'])->name('user.konser.pembayaranProcess');
Route::get('/user/konser/qris/{order_id}', [KonserController::class, 'qris'])->name('user.konser.qris');
Route::get('/user/konser/struk/{order_id}', [KonserController::class, 'struk'])->name('user.konser.struk');

// user konser
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/konser', [KonserController::class, 'index'])->name('user.konser.index');
Route::get('/user/konser/detail/{id}', [KonserController::class, 'detail'])->name('user.konser.detail');

//use cetak pdf
Route::get('/user/konser/pdf/{order_id}', [KonserController::class, 'stream'])->name('user.konser.pdf');

// admin dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');

//admin data konser
Route::get('/admin/konser', [AdminKonserController::class, 'Transaksi'])->name('admin.konser');
Route::get('/admin/create', [AdminKonserController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminKonserController::class, 'store'])->name('admin.store');
Route::delete('/admin/konser/destroy/{id}', [AdminKonserController::class, 'destroy'])->name('admin.konser.destroy');

//admin data pembayaran
Route::get('/admin/transaksi', [AdminKonserController::class, 'index'])->name('admin.transaksi');


// user login
Route::get('/user/login', [UserController::class, 'login'])->name('user.login.index');
Route::post('/user/loginProcess', [UserController::class, 'loginProcess'])->name('user.login.loginProcess');

// user register
Route::get('/user/register', [UserController::class, 'register'])->name('user.login.register');
Route::post('/user/registerProcess', [UserController::class, 'registerProcess'])->name('user.login.registerProcess');

// user logout
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.login.logout');