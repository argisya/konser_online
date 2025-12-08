<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use Illuminate\Http\Request;

class AdminConcertController extends Controller
{
    public function index()
    {
        $concerts = Konser::all();
        return view('user.konser.index', compact('concerts'));
    }

    public function create()
    {
        return view('user.konser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'poster' => 'image|max:2048'
        ]);

        $posterName = null;

        if ($request->hasFile('poster')) {
            $posterName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('posters'), $posterName);
        }

        Concert::create([
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'poster' => $posterName,
        ]);

        return redirect()->route('user.konser.index')
            ->with('success', 'Konser berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $concert = Concert::findOrFail($id);

        return view('user.konser.edit', compact('concert'));
    }

    public function update(Request $request, $id)
    {
        $concert = Concert::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'poster' => 'image|max:2048'
        ]);

        if ($request->hasFile('poster')) {

            if ($concert->poster && file_exists(public_path('posters/' . $concert->poster))) {
                unlink(public_path('posters/' . $concert->poster));
            }

            $posterName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('posters'), $posterName);

            $concert->poster = $posterName;
        }

        $concert->update([
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('user.konser.index')
            ->with('success', 'Konser berhasil diperbarui!');
    }

    public function delete($id)
    {
        $konser = Concert::findOrFail($id);

        if ($konser->poster && file_exists(public_path('posters/' . $konser->poster))) {
            unlink(public_path('posters/' . $konser->poster));
        }

        $konser->delete();

        return redirect()->route('admin.konser.index')
            ->with('success', 'Konser berhasil dihapus!');
    }
}
