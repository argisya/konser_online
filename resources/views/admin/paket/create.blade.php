@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Paket untuk {{ $konser->judul }}</h3>

    <form action="{{ route('admin.paket.store', $konser->id) }}" method="POST">
        @csrf

        <label>Nama Paket</label>
        <input type="text" name="nama_paket" class="form-control" required>

        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>

        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
