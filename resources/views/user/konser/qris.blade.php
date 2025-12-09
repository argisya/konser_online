@extends('user.layout')
@section('titlee', 'Transaksi - mini konser')

@section('content')

        <section class="pay-section">
            <div class="pay-box">

                <h1 class="pay-title">PEMBAYARAN QRIS</h1>
                <p class="pay-subtitle">Silakan scan QRIS di bawah ini sebelum waktu habis</p>

                

                <!-- QRIS -->
                <img src="{{ asset('storage/img-konser/dummy_qris.png') }}" class="qris-box" alt="QRIS">

                <div class="payment-info-wrapper">
                    <p class="pay-total"><b>Total Pembayaran:</b> Rp {{ number_format($transaksi->total, 0, ',', '.') }}</p>
                    <p class="pay-transaksi"><b>Order ID:</b> {{ $transaksi->order_id }}</p>
                    <p class="pay-time-title">Selesaikan Pembayaran Dalam:</p>
                    <!-- COUNTDOWN -->
                    <h2 style="color:#ffdd00; margin-top:20px;">Waktu Tersisa: <span id="countdown">0:10</span></h2>
                    <p class="pay-footer">Anda Akan Otomatis diarahkan ke halaman kuitansi setelah pembeyaran berhasil atau waktu habis</p>
                </div>

            </div>
        </section>

     <script>
        let timeLeft = 10;

        function startCountdown() {
            const timer = document.getElementById("countdown");

            const interval = setInterval(() => {
                let minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;

                timer.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                timeLeft--;

                if (timeLeft < 0) {
                    clearInterval(interval);

                    // Redirect otomatis ke struk
                    window.location.href = "{{ route('user.konser.struk', $transaksi->order_id) }}";
                }
            }, 1000);
        }

        window.onload = startCountdown;
    </script>

@endsection