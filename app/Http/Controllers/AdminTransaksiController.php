<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaction::with('konser')->latest()->get();
        return view('backend.transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaction::with('konser')->findOrFail($id);
        return view('backend.transaksi.show', compact('transaksi'));
    }

    public function destroy($id)
    {
        $transaksi = Transaction::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('backend.transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus!');
    }
}
