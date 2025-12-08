@extends('admin.layout')

@section('content')

<h2 class="dashboard-title">Dashboard Admin</h2>
<p class="dashboard-subtitle">Selamat datang di panel admin. Berikut rangkuman data konser.</p>

<!-- STATISTIC CARDS -->
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon bg-blue"></div>
        <div>
            <div class="stat-title">Total Konser</div>
            <div class="stat-value">{{ $totalKonser }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon bg-green"></div>
        <div>
            <div class="stat-title">Total Paket Tiket</div>
            <div class="stat-value">{{ $totalPaket }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon bg-purple"></div>
        <div>
            <div class="stat-title">Total Transaksi</div>
            <div class="stat-value">{{ $totalTransaksi }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon bg-yellow"></div>
        <div>
            <div class="stat-title">Total Pendapatan</div>
            <div class="stat-value">Rp {{ number_format($totalPendapatan) }}</div>
        </div>
    </div>

</div>

<br><br>

<!-- GRAFIK -->
<div class="card-container">
    <h3 class="section-title">Grafik Pendapatan Per Bulan</h3>
    <canvas id="grafikPendapatan" height="80"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPendapatan');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($bulanList),
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: @json($totalList),
                borderWidth: 3,
                tension: 0.4,
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79, 70, 229, 0.15)',
                pointBackgroundColor: '#4f46e5',
                pointRadius: 6
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>

<br><br>

<!-- TRANSAKSI TERBARU -->
<div class="card-container">
    <h3 class="section-title">Transaksi Terbaru</h3>

    <table class="modern-table">
        <thead>
            <tr>
                <th>Nama Pembeli</th>
                <th>Paket</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>

            @foreach($transaksiBaru as $t)
            <tr>
                <td>{{ $t->nama }}</td>
                <td>{{ $t->paket }}</td>
                <td>{{ $t->jumlah }}</td>
                <td>Rp {{ number_format($t->total_harga) }}</td>
                <td>{{ $t->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach

            @if($transaksiBaru->count() == 0)
            <tr>
                <td colspan="5" class="empty-text">Belum ada transaksi</td>
            </tr>
            @endif

        </tbody>
    </table>
</div>

<br><br>

<!-- STOK HAMPIR HABIS -->
<div class="card-container">
    <h3 class="section-title">Paket Hampir Habis (Stok ≤ 10)</h3>

    <table class="modern-table">
        <thead>
            <tr>
                <th>Paket</th>
                <th>Konser</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>

            @foreach($stokHampirHabis as $s)
            <tr>
                <td>{{ $s->nama_paket }}</td>
                <td>{{ $s->konser->judul }}</td>
                <td class="low-stock">{{ $s->stok }}</td>
            </tr>
            @endforeach

            @if($stokHampirHabis->count() == 0)
            <tr>
                <td colspan="3" class="empty-text">Semua stok aman</td>
            </tr>
            @endif

        </tbody>
    </table>
</div>

@endsection
