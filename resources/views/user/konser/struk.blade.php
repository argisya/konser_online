@extends('user.layout')
@section('title', 'Transaksi - mini konser')
@section('content')

<div class="container">
    <div class="kuitansi-container">
        <h2 class="h2-style">Pembayaran Tiket Berhasil! </h2>
        <p class="text-center mb-2">Berikut adalah detail kuitansi Anda. Simpan baik-baik ya!</p>
        
        <div class="kuitansi-detail">
            <p><strong>No. Transaksi:</strong> {{ $transaksi->order_id }}</p>
            <p><strong>Nama Konser:</strong> {{ $detail->nama }}</p>
            <p><strong>Nama Pembeli:</strong> {{ $transaksi->nama }}</p>
            <p><strong>Email Pembeli:</strong> {{ $transaksi->email }}</p>
            <p><strong>Jumlah Tiket:</strong> {{ $transaksi->jumlah }}</p>
            <p><strong>Kelas Tiket:</strong> {{ $transaksi->kelas }}</p>
            <p><strong>Harga Satuan:</strong>
                @if($transaksi->kelas == 'Regular')
                    Rp {{ number_format(250000, 0, ',', '.') }}
                @elseif($transaksi->kelas == 'VIP')
                    Rp {{ number_format(500000, 0, ',', '.') }}
                @elseif($transaksi->kelas == 'VVIP')
                    Rp {{ number_format(750000, 0, ',', '.') }}
                @endif
            </p>
        </div>

        <div class="kuitansi-total">
            <h3>Total Pembayaran: {{  number_format($transaksi->total, 0, ',', '.') }}</h3>
        </div>

        <div class="kuitansi-actions">
            <a href="{{ route('user.konser.index') }}" class="btn btn-primary">Kembali ke Daftar Konser</a>
            <a href="download_tiket.php" class="btn btn-primary" target="_blank">Unduh Tiket</a>
        </div>
         <p class="text-center mt-2" style="font-size:0.9em; color:#aaa;">Terima kasih telah melakukan pembelian tiket melalui Info Konser Bogor!</p>
    </div>
</div>

@endsection