<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonserController;

Route::get('/', function () {
    return view('user/index');
});

// user konser
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/konser', [KonserController::class, 'index'])->name('user.konser.index');
Route::get('/user/konser/detail/{id}', [KonserController::class, 'detail'])->name('user.konser.detail');

// user konser detail
Route::get('/user/konser/transaksi/{id}', [KonserController::class, 'transaksi'])->name('user.konser.transaksi');
Route::post('/user/konser/transaksi/{id}', [KonserController::class, 'transaksi'])->name('user.konser.transaksi');

// user konser transaksi
Route::post('/user/konser/bayar', [KonserController::class, 'bayar'])->name('user.konser.bayar');