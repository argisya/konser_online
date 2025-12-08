@extends('user.layout')
@section('title', 'Pembelian Tiket')
@section('content')

<section style="margin-top:100px; display:flex; justify-content:center; align-items:flex-start;">

    <div style="background:#1b1b1b; padding:40px; border-radius:10px; width:500px; color:white; box-shadow:0 0 10px rgba(255,255,255,0.1);">

        <h2 style="text-align:center; color:#FFD400; margin-bottom:5px; font-size:28px;">
            Form Pembelian Tiket
        </h2>
        <h3 style="text-align:center; color:white; margin-bottom:30px; font-size:18px;">
            {{ $konser->nama }}
        </h3>

        <form action="{{ route('user.konser.bayar') }}" method="POST">
            @csrf

            
            <label style="font-weight:bold;">Nama Lengkap Pembeli</label>
            <input type="text" name="nama" required style="width:100%; margin-bottom:15px; padding:10px; border-radius:5px; border:none; background:#111; color:white;">

            
            <label style="font-weight:bold;">Alamat Email</label>
            <input type="email" name="email" required style="width:100%; margin-bottom:15px; padding:10px; border-radius:5px; border:none; background:#111; color:white;">

            
            <label style="font-weight:bold;">Jumlah Tiket</label>
            <input type="number" min="1" name="jumlah" value="1" required
                style="width:100%; margin-bottom:15px; padding:10px; border-radius:5px; border:none; background:#111; color:white;">

            
            <label style="font-weight:bold;">Pilih Kelas Tiket</label>
            <select name="kelas" required
                style="width:100%; margin-bottom:20px; padding:10px; border-radius:5px; border:none; background:#111; color:white;">
                <option value="">-- Pilih Kelas --</option>
            </select>

            
            <input type="hidden" name="konser_id" value="{{ $konser->id }}">

            
            <button type="submit"
                style="width:100%; padding:12px; border-radius:5px; background:#FFD400; border:none; font-weight:bold; cursor:pointer;">
                LANJUTKAN KE PEMBAYARAN
            </button>
        </form>

        <div style="text-align:center; margin-top:20px;">
            <a href="{{ route('user.konser.detail', $konser->id) }}" style="color:#FFD400; text-decoration:none;">
                « Kembali ke detail konser
            </a>
        </div>

    </div>

</section>

@endsection
