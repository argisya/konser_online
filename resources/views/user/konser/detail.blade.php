@extends('user.layout')
@section('title', 'Detail Konser di Bogor')
@section('content')

<section class="concert-container">
    <div class="concert-card">
        <div class="concert-detail">    
            <div class="concert-image">
                <img src="{{ asset('storage/img-konser/' . $konser->poster) }}" alt="{{ $konser->nama }}">
            </div>

            <div class="concert-info">
                <h1 >{{ $konser->nama }}</h1>
                <p><strong>Tanggal:</strong> {{ date('d M Y', strtotime($konser->tanggal)) }}</p>
                <p><strong>Lokasi:</strong> {{ $konser->lokasi }}</p>
                <p><strong>Waktu:</strong> {{ $konser->waktu }}</p>
                <p class="description"><strong>Deskripsi:</strong> {{ $konser->deskripsi }}</p>

                @if(session('user_id')==true)
                <a href="{{ route('user.konser.transaksi', ['id' => $konser->id]) }}" class="btn btn-primary">Pesan Tiket</a>
                @else
                <a href="{{ route('user.login.index') }}" class="btn btn-primary">Pesan Tiket</a>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection