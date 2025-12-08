<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonserController;

Route::get('/', function () {
    return view('user/index');
});

// user konser transaksi
Route::get('/user/konser/transaksi/{id}', [KonserController::class, 'transaksi'])->name('user.konser.transaksi');
Route::post('/user/konser/qrcode', [KonserController::class, 'pembayaran'])->name('user.konser.qrcode');
Route::get('/user/konser/struk/{$id}', [KonserController::class, 'struk'])->name('user.konser.struk');


// user konser
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/konser', [KonserController::class, 'index'])->name('user.konser.index');
Route::get('/user/konser/detail/{id}', [KonserController::class, 'detail'])->name('user.konser.detail');

// user login
Route::get('/user/login', [UserController::class, 'login'])->name('user.login.index');
Route::post('/user/loginProcess', [UserController::class, 'loginProcess'])->name('user.login.loginProcess');

// user register
Route::get('/user/register', [UserController::class, 'register'])->name('user.login.register');
Route::post('/user/registerProcess', [UserController::class, 'registerProcess'])->name('user.login.registerProcess');

// user logout
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.login.logout');