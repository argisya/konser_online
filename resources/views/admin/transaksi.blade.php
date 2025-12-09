@extends('admin.layout')

@section('content')

<h1 class="title">DATA PEMBAYARAN</h1>
<p class="subtitle-admin">Semua Pembayaran yang diajukan oleh user terdaftar.</p>

<table class="table-dark">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Order ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Harga Tiket</th>
            <th>Total Bayar</th>
            <th></th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->order_id }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->kelas }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>Rp {{  number_format($row->harga, 0, ',', '.') }}</td>
            <td>Rp {{  number_format($row->total, 0, ',', '.') }}</td>
            <td>{{ $row->lokasi }}</td>
            <td>
                <span class="badge-status {{ $row->status }}">
                {{ strtoupper($row->status) }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
