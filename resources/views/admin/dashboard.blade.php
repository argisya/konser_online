@extends('admin.layout')

@section('content')
<!-- STATISTIC CARDS -->
<div class="dashboard-container">

    <h1 class="title">DASHBOARD ADMIN</h1>
    <p class="subtitle-box">Visualisasi data konser dan transaksi.</p>

    <div class="stats-box">
        <div class="card-box">
            <h2>{{ $jumlahKonser }}</h2>
            <p>Total Konser</p>
        </div>
        <div class="card-box">
            <h2>{{ $totalTransaksi }}</h2>
            <p>Total Transaksi</p>
        </div>
        <div class="card-box">
            <h2>Rp {{ number_format($totalPendapatan) }}</h2>
            <p>Total Pendapatan</p>
        </div>
        <div class="card-box">
            <h2>{{ $tanggalTerakhir }}</h2>
            <p>Tanggal Konser Terbaru</p>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="chartTransaksi"></canvas>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    try {
        console.log('Chart data labels:', {!! json_encode($bulanKonser) !!});
        console.log('Chart data values:', {!! json_encode($jumlahTransaksiPerBulan) !!});

        var canvas = document.getElementById('chartTransaksi');
        if (!canvas) {
            console.warn('Canvas #chartTransaksi not found');
            return;
        }

        var ctx = canvas.getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($bulanKonser) !!},
                datasets: [{
                    label: 'Transaksi per Bulan',
                    data: {!! json_encode($jumlahTransaksiPerBulan) !!},
                    borderColor: '#FFD600',
                    backgroundColor: 'rgba(255,214,0,0.15)',
                    tension: 0.4,
                    borderWidth: 3
                }]
            },
            options: {
                plugins: { legend: { labels: { color: '#FFF' }}},
                scales: {
                    x: { ticks: { color: '#FFF' }, grid: { color: '#333' }},
                    y: { ticks: { color: '#FFF' }, grid: { color: '#333' }}
                }
            }
        });
    } catch (err) {
        console.error('Chart init error:', err);
    }
});
</script>
@endpush