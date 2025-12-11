@extends('admin.layout')

@section('content')

<h1 class="title">DATA KONSER USER</h1>

<a href="{{ route('admin.create') }}" class="btn btn-primary-add" style="margin-bottom: 15px; ">
    + Tambah Konser
</a> <br>
<br><table class="table-dark">
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
                <form action="{{ route('admin.konser.destroy' , $row->id) }}}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn-delete show_confirm" data-konf-delete="{{ $row->nama}}" title='Hapus Data'>Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
