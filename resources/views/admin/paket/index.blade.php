@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <h3>Paket Konser: {{ $konser->judul }}</h3>

    <a href="{{ route('admin.paket.create', $konser->id) }}" class="btn btn-primary mb-3">
        + Tambah Paket
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Paket</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($paket as $p)
            <tr>
                <td>{{ $p->nama_paket }}</td>
                <td>Rp {{ number_format($p->harga) }}</td>
                <td>{{ $p->stok }}</td>
                <td>
                    <a href="{{ route('admin.paket.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a onclick="return confirm('Hapus paket?')" 
                       href="{{ route('admin.paket.delete', $p->id) }}" 
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach

            @if($paket->count() == 0)
            <tr>
                <td colspan="4" class="text-center">Belum ada paket konser</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
