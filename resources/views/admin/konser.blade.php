@extends('admin.layout')

@section('content')

<h1 class="title">DATA KONSER USER</h1>
<p class="subtitle-admin">Semua konser yang diajukan oleh user terdaftar.</p>

<table class="table-dark">
    <thead>
        <tr>
            <th>No</th>
            <th>Poster</th>
            <th>Nama Konser</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($konser as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ asset('storage/img-konser/'.$row->poster) }}" width="70"></td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->lokasi }}</td>
            <td>{{ $row->deskripsi }}</td>
            <td>
                <form action="" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
