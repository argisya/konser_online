@extends('user.layout')
@section('titlee', 'Beli Tiket - mini konser')
@section('content')
        <!-- FORM CONTAINER -->
        <div class="form-wrapper">
            <h1 class="form-title">FORM PEMBELIAN TIKET</h1>
            <h2 class="form-subtitle">Bogoria Festival 2025</h2>

            <form method="POST" action="{{ route('user.konser.pembayaranProcess') }}" class="ticket-form">
                @csrf
                {{-- <input type="hidden" name="order_id" value="{{ $konser->id }}"> --}}

                <label>Nama Lengkap Pembeli</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>

                <label>Alamat Email</label>
                <input type="email" name="email" placeholder="Masukkan email aktif" required>

                <label>Jumlah Tiket</label>
                <input type="number" min="1" name="jumlah" placeholder="Jumlah tiket" required>

                <label>Pilih Kelas Tiket</label>
                <select name="kelas" required>
                    <option value="Regular">Regular</option>
                    <option value="VIP">VIP</option>
                    <option value="VVIP">VVIP</option>
                </select>

                <button type="submit" class="btn-primary w-100" style="margin-top: 20px;">Lanjutkan Pembayaran</button>
                
                <a href="{{ route('user.konser.index') }}" class="btn-outline w-100" style="margin-top: 10px; display: block; text-align:center;">
                    Kembali ke Konser
                </a>

            </form>
        </div>
@endsection