<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konser;

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

    public function transaksi(string $id)
    {
        $konser = Konser::findOrFail($id);
        return view('user.konser.transaksi', [
            'konser' => $konser
        ]);
    }

    public function bayar(Request $request)
    {
        
        return redirect()->route('user.konser.index')->with('success', 'Pembayaran berhasil!');
    }
}