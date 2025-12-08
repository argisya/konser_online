@extends('user.layout')
@section('titlee', 'Transaksi - mini konser')
@section('content')

    <div class="struk-wrapper">
        <h1 class="struk-title">Pembayaran Berhasil</h1>

        <p class="struk-text">Order ID: <b>{{ $order_id }}</b></p>
        <p class="struk-text">Nama: {{ $nama }}</p>
        <p class="struk-text">Email: {{ $email }}</p>
        <p class="struk-text">Kelas Tiket: {{ $kelas }}</p>
        <p class="struk-text">Jumlah Tiket: {{ $jumlah }}</p>
        <p class="struk-text">Total Pembayaran: Rp {{ number_format($total, 0, ',', '.') }}</p>
        <p class="struk-text">Terima kasih telah melakukan pembelian tiket.</p>

        <a href="{{ route('homepage') }}" class="btn-primary" style="margin-top:25px; display:inline-block;">
            Kembali ke Beranda
        </a>
    </div>

@endsection