<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konser;
use App\Models\Transaksi;

class KonserController extends Controller
{
    public function index()
    {
        $konser = Konser::all();
        return view('user.konser.index' ,[
            'konser' => $konser]);
    }
    public function detail(string $id)
    {
        $konser = Konser::findOrFail($id);
        return view('user.konser.detail', [
            'konser' => $konser
        ]);
    }
    public function transaksi(String $id)
    {
        $konser = Konser::findOrFail($id);
        return view('user.konser.transaksi', [
            'konser' => $konser,
        ]);
    }
    public function pembayaran(Request $request)
    {
        $konser = Konser::findOrFail($request->konser_id);
        // Logika pemrosesan pembayaran dapat ditambahkan di sini

        // Generate Order ID
        $order_id = 'ORD-' . strtoupper(uniqid());
        // Hitung total harga
        $harga = $konser->harga;
        $jumlah = $request->jumlah;
        $total = $harga * $jumlah;

        // Simpan ke database
        Transaksi::create([
            'order_id' => $order_id,
            'konser_id' => $konser->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'jumlah' => $request->jumlah,
            'kelas' => $request->kelas,
            'total_bayar' => $total,
        ]);

        return view('user.konser.qrcode', [
            'konser' => $konser,
        ]);
    }
    public function qris($order_id)
    {
        $transaksi = Transaksi::where('order_id', $order_id)->firstOrFail();
        return view('user.konser.qris', compact('transaksi'));
    }

    public function struk(String $id)
    {
        $konser = Konser::findOrFail($id);
        return view('user.konser.struk', [
            'konser' => $konser,
        ]);
    }
}
