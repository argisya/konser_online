@extends('admin.layout')

@section('content')

<h2>Edit Konser</h2>

<form action="{{ route('admin.konser.update', $konser->id) }}" 
      method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Nama Konser</label>
        <input type="text" name="nama_konser" 
               class="form-control" value="{{ $konser->nama_konser }}">
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" 
               class="form-control" value="{{ $konser->tanggal }}">
    </div>

    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="lokasi" 
               class="form-control" value="{{ $konser->lokasi }}">
    </div>

    <div class="mb-3">
        <label>Stok Tiket</label>
        <input type="number" name="stok" 
               class="form-control" value="{{ $konser->stok }}">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" 
               class="form-control" value="{{ $konser->harga }}">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="5">{{ $konser->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
        <label>Thumbnail (Opsional)</label><br>

        <img src="{{ asset('thumbnail/'.$konser->thumbnail) }}" 
             width="150" class="mb-2"><br>

        <input type="file" name="thumbnail" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Konser</button>
</form>

@endsection
