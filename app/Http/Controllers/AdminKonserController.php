<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konser;
use App\Models\Transaksi;
use App\Helpers\ImageHelper;

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

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'nama' => 'required', 
            'tanggal' => 'required', 
            'waktu' => 'required', 
            'lokasi' => 'required', 
            'deskripsi' => 'required', 
            'poster' => 'required|image|mimes:jpeg,jpg,png|file|max:2000' 
        ]); 
 
        if ($request->file('poster')) { 
            $file = $request->file('poster'); 
            $extension = $file->getClientOriginalExtension(); 
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension; 
            $directory = 'storage/img-konser/'; 
 
            // Simpan gambar asli 
            $fileName = ImageHelper::uploadAndResize($file, $directory, $originalFileName); 
            $validatedData['poster'] = $fileName; 
 
            // create thumbnail 1 (lg) 
            $thumbnailLg = 'thumb_lg_' . $originalFileName; 
            ImageHelper::uploadAndResize($file, $directory, $thumbnailLg, 800, null); 
 
            // create thumbnail 2 (md) 
            $thumbnailMd = 'thumb_md_' . $originalFileName; 
            ImageHelper::uploadAndResize($file, $directory, $thumbnailMd, 500, 519); 
 
            // create thumbnail 3 (sm) 
            $thumbnailSm = 'thumb_sm_' . $originalFileName; 
            ImageHelper::uploadAndResize($file, $directory, $thumbnailSm, 100, 110); 
 
            // Simpan nama file asli di database 
            $validatedData['poster'] = $originalFileName; 
        } 
 
        Konser::create($validatedData);
        return redirect()->route('admin.konser')->with('success, konser berhasil di tambahkan!');
    }
}
