@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Konser</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.konser.create') }}" class="btn btn-primary mb-3">+ Tambah Konser</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Poster</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th width="22%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($konser as $index => $k)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    @if($k->thumbnail)
                        <img src="{{ asset('thumbnail/'.$k->thumbnail) }}" width="100">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>

                <td>{{ $k->judul }}</td>
                <td>{{ $k->lokasi }}</td>
                <td>{{ $k->tanggal }}</td>

                <td>
                    <a href="{{ route('admin.konser.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <a href="{{ route('admin.konser.delete', $k->id) }}"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus konser ini?')">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach

            @if($konser->count() == 0)
            <tr>
                <td colspan="6" class="text-center">Belum ada data konser</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
