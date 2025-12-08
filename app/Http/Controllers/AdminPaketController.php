<?php
namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\PaketKonser;
use Illuminate\Http\Request;

class AdminPaketController extends Controller
{
    public function index($konser_id)
    {
        $konser = Concert::findOrFail($konser_id);
        $paket = $konser->paket;

        return view('admin.paket.index', compact('konser', 'paket'));
    }

    public function create($konser_id)
    {
        $konser = Concert::findOrFail($konser_id);
        return view('admin.paket.create', compact('konser'));
    }

    public function store(Request $request, $konser_id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        PaketKonser::create([
            'konser_id' => $konser_id,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()
            ->route('admin.paket.index', $konser_id)
            ->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $paket = PaketKonser::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketKonser::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $paket->update($request->all());

        return redirect()
            ->route('admin.paket.index', $paket->konser_id)
            ->with('success', 'Paket berhasil diperbarui!');
    }

    public function delete($id)
    {
        $paket = PaketKonser::findOrFail($id);
        $konser_id = $paket->konser_id;

        $paket->delete();

        return redirect()
            ->route('admin.paket.index', $konser_id)
            ->with('success', 'Paket berhasil dihapus!');
    }
}
