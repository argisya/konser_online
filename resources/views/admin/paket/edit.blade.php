@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Paket Konser</h3>

    <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST">
        @csrf

        <label>Nama Paket</label>
        <input type="text" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>

        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required>

        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $paket->stok }}" required>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
