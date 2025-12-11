@extends('admin.layout')

@section('content')
<section class="login-section">
    <div class="login-box">
    <h2>Tambah Konser Baru</h2>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>Nama Konser</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal Konser</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Waktu Konser</label>
            <input type="time" name="waktu" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Deskripsi Konser</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Lokasi Konser</label>
            <textarea name="lokasi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Poster Konser</label>
            <input type="file" name="poster" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top: 10px;">Simpan</button>
    </form>
</div>

</section>
@endsection
