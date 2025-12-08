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

            <form action="{{ route('login.action') }}" method="POST">
                @csrf
                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <a href="{{ route('user.konser.index') }}" class="btn-back">Kembali</a>
        </div>
    </section>

@endsection