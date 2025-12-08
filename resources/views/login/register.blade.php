@extends('user.layout')
@section('title', 'Register')
@section('content')

    <section class="login-section">
        <div class="login-box">

            <h1 class="yellow-title">Buat Akun Baru</h1>
            <p class="subtitle">Dapatkan akses penuh ke info konser dan kemudahan pembelian tiket.</p>

            @if($errors->has('register'))
                <div class="error-msg">
                    {{ $errors->first('register') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-msg">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="success-msg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('user.login.registerProcess') }}" method="POST">
                @csrf
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required>

                <label>Alamat Email</label>
                <input type="email" name="email" placeholder="cth: email@anda.com" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password Anda" required>

                <button type="submit">DAFTAR SEKARANG</button>
            </form>
            <p class="text-center mt-2">Sudah punya akun? <a href="{{ route('user.login.index') }}" class="btn-back">Masuk di sini</a></p>
        </div>
    </section>

@endsection