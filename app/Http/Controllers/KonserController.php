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

        // Generate Order ID
        $order_id = 'ORD-' . strtoupper(uniqid());

        if($request->kelas == 'Regular'){
            $harga = 250000;
        }elseif($request->kelas == 'VIP'){
            $harga = 500000;
        }elseif($request->kelas == 'VVIP'){
            $harga = 750000;
        }
        
        // Hitung total harga
        $total = $harga * $request->jumlah;

        // Simpan ke database
        Transaksi::create([
            'order_id' => $order_id,
            'konser_id' => $request->konser_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'jumlah' => $request->jumlah,
            'kelas' => $request->kelas,
            'harga' => $harga,
            'total' => $total
        ]);

        return redirect()->route('user.konser.qris', ['order_id' => $order_id]);
    }

    public function qris(String $order_id)
    {
        $transaksi = Transaksi::where('order_id', $order_id)->firstOrFail();
        return view('user.konser.qris', [
            'transaksi' => $transaksi,
        ]);
    }

    public function struk(String $order_id)
    {
        $transaksi = Transaksi::where('order_id', $order_id)->firstOrFail();
        $detail = Konser::where('id', $transaksi->konser_id)->firstOrFail();
        return view('user.konser.struk', [
            'transaksi' => $transaksi,
            'detail' => $detail
        ]);
    }
}
