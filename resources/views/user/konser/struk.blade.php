@extends('user.layout')
@section('title', 'Transaksi - mini konser')
@section('content')

<div class="container">
    <div class="kuitansi-container">
        <h2 class="h2-style">Pembayaran Tiket Berhasil! </h2>
        <p class="text-center mb-2">Berikut adalah detail kuitansi Anda. Simpan baik-baik ya!</p>
        
        <div class="kuitansi-detail">
            <p><strong>No. Transaksi:</strong> INV-20251208-8BBEA</p>
            <p><strong>Nama Konser:</strong> Sunset di Kebun 2025</p>
            <p><strong>Nama Pembeli:</strong> Rizla Azc</p>
            <p><strong>Email Pembeli:</strong> azchafahrezi@gmail.com</p>
            <p><strong>Jumlah Tiket:</strong> 1 buah</p>
            <p><strong>Kelas Tiket:</strong> VIP</p>
            <p><strong>Harga Satuan:</strong> Rp 750.000</p>
        </div>

        <div class="kuitansi-total">
            <h3>Total Pembayaran: Rp 750.000</h3>
        </div>

        <div class="kuitansi-actions">
            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali ke Daftar Konser</a>
            <a href="download_tiket.php" class="btn btn-primary" target="_blank">Unduh Tiket</a>
        </div>
         <p class="text-center mt-2" style="font-size:0.9em; color:#aaa;">Terima kasih telah melakukan pembelian tiket melalui Info Konser Bogor!</p>
    </div>
</div>

@endsection