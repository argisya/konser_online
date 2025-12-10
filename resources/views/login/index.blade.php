@extends('user.layout')
@section('title', 'Login')
@section('content')

    <section class="login-section">
        <div class="login-box">

            <h1 class="yellow-title">LOGIN</h1>
            <p class="subtitle">Masuk untuk melanjutkan</p>

            @if($errors->has('login'))
                <div class="error-msg">
                    {{ $errors->first('login') }}
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

            <form action="{{ route('user.login.loginProcess') }}" method="POST">
                @csrf
                <label>Alamat Email</label>
                <input type="email" name="email" placeholder="cth: email@anda.com" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password Anda" required>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="text-center mt-2">Belum punya akun? <a href="{{ route('user.login.register') }}" class="btn-back">Daftar di sini</a></p>
            <a href="{{ route('user.konser.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </section>

@endsection