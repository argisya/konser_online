<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konser;
use App\Models\Transaksi;

class AdminKonserController extends Controller
{    
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi' ,[
            'transaksi' => $transaksi]);
    }

    public function transaksi()
    {
        $konser = Konser::all();
        return view('admin.konser' ,[
            'konser' => $konser]);
    }

    public function updateStatus($id)
    {
        $konser = Konser::findOrFail($id);
        $konser->status = $konser->status === 'pending' ? 'paid' : 'pending';
        $konser->save();

        return redirect()->back()->with('success', 'Status konser berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        Konser::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Konser berhasil dihapus.');
    }
}
