<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKonserController;
use App\Http\Controllers\AdminPaketController;
use App\Http\Controllers\AdminTransaksiController;

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

// admin auth
Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login.index');
Route::post('login', [AdminAuthController::class, 'login'])->name('login.action');

Route::middleware('auth:admin')->group(function () {
    
    // Dashboard
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Konser Management
    Route::get('admin/konser/index', [AdminKonserController::class, 'index'])->name('admin.konser.index');
    Route::resource('admin/konser', AdminKonserController::class);
    Route::get('admin/konser/{id}/edit', [AdminKonserController::class, 'edit'])->name('admin.konser.edit');
    Route::post('admin/konser/{id}/update', [AdminKonserController::class, 'update'])->name('admin.konser.update');
    Route::get('admin/konser/{id}/delete', [AdminKonserController::class, 'destroy'])->name('admin.konser.delete');

    // Paket Konser Management
    Route::get('admin/konser/{konser_id}/paket', [AdminPaketController::class, 'index'])->name('admin.paket.index');
    Route::get('admin/konser/{konser_id}/paket/create', [AdminPaketController::class, 'create'])->name('admin.paket.create');
    Route::get('admin/paket/{id}/edit', [AdminPaketController::class, 'edit'])->name('admin.paket.edit');

   // Paket Konser Management
    Route::get('admin/konser/index', [AdminKonserController::class, 'index'])->name('admin.konser.index');
    Route::get('admin/konser/{id}/edit', [AdminKonserController::class, 'edit'])->name('admin.konser.edit');
    Route::post('admin/konser/{id}/update', [AdminKonserController::class, 'update'])->name('admin.konser.update');
    Route::get('admin/konser/{id}/delete', [AdminKonserController::class, 'destroy'])->name('admin.konser.delete');



    // Transaksi Management
        // Route transaksi admin
        Route::get('admin/transaksi', [\App\Http\Controllers\Admin\TransaksiController::class, 'index'])->name('admin.transaksi.index');

    // Logout
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});