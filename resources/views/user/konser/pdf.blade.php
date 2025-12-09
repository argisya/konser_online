<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Konser - {$id_transaksi}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Bebas+Neue&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            -webkit-font-smoothing: antialiased;
        }
        .ticket-container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .ticket {
            width: 100%;
            max-width: 750px;
            border: 2px solid #2E503B;
            border-radius: 10px;
            overflow: hidden;
            display: table;
            table-layout: fixed;
            page-break-inside: avoid !important;
        }
        .ticket-main {
            display: table-cell;
            width: 65%;
            padding: 20px;
            border-right: 2px dashed #2E503B;
            box-sizing: border-box;
            vertical-align: top;
        }
        .ticket-stub {
            display: table-cell;
            width: 35%;
            padding: 0;
            text-align: center;
            background-color: #f0f8ff;
            box-sizing: border-box;
            vertical-align: top;
        }
        .stub-inner-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            min-height: inherit; 
        }
        .ticket-header h1 {
            font-family: 'Bebas Neue', cursive;
            color: #2E503B;
            font-size: 26px;
            margin: 0 0 5px 0;
        }
        .ticket-header p.subtitle-konser {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #444;
            margin: 0 0 10px 0;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .id-transaksi-main {
            font-size: 11px;
            color: #555;
            margin: 0 0 15px 0;
        }
        .ticket-body p {
            font-size: 13px;
            margin: 4px 0;
            line-height: 1.5;
        }
        .ticket-body strong {
            color: #2E503B;
            font-weight: 600;
        }
        .detail-konser {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px dashed #ccc;
        }
        .ticket-footer {
            margin-top: 15px;
            font-size: 9px;
            text-align: center;
            color: #777;
        }
        .stub-content {
            text-align: center;
            width: 100%;
        }
        .stub-title {
            font-family: 'Bebas Neue', cursive;
            color: #2E503B;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .stub-id-transaksi {
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 12px;
            word-wrap: break-word;
        }
        .stub-id-transaksi strong {
            display:block;
            font-size: 11px;
            color: #555;
            margin-bottom: 3px;
            text-transform: uppercase;
        }
        .barcode-container-stub {
            width: 100%;
            max-width: 140px;
            height: auto;
            margin: 10px auto;
        }
        .barcode-container-stub img {
            width: 100%;
            height: auto;
            display: block;
        }
        .stub-footer-info {
            font-size: 10px;
            color: #555;
            margin-top: auto;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket">
            <div class="ticket-main">
                <div class="ticket-header">
                    <h1>E-TIKET KONSER</h1>
                    <p class="subtitle-konser">{{ $detail->nama }}</p>
                    <p class="id-transaksi-main">ID Transaksi: {{$transaksi->order_id}}</p>
                </div>
                <div class="ticket-body">
                    <p><strong>Nama Pembeli:</strong> {{ $transaksi->nama }}</p>
                    <p><strong>Email:</strong> {{ $transaksi->email }}</p>
                    <p><strong>Jumlah Tiket:</strong> {{ $transaksi->jumlah }} buah</p>
                    <p><strong>Kelas:</strong> {{ $transaksi->kelas }}</p>
                    <p><strong>Total Bayar:</strong> Rp {{  number_format($transaksi->total, 0, ',', '.') }}</p>
                </div>
                <div class="detail-konser">
                    <p><strong>Tanggal:</strong> {{ $detail->tanggal }}</p>
                    <p><strong>Lokasi:</strong> {{ $detail->lokasi }}</p>
                </div>
                <div class="ticket-footer">
                    Ini adalah bukti pembelian yang sah. Harap dibawa saat acara.
                    <br>Info Konser Bogor &copy; >
                </div>
            </div>
            <div class="ticket-stub">
                <div class="stub-inner-wrapper">
                    <div class="stub-content">
                        <p class="stub-title">{{ $detail->nama }}</p>
                        <div class="stub-id-transaksi">
                            <strong>ID Transaksi</strong>
                            {{ $transaksi->order_id }}
                        </div>
                        <div class="barcode-container-stub">
                            <img src="{{($barcodeBase64) }}" alt="Kode Unik Tiket">
                        </div>
                    </div>
                    <div class="stub-footer-info">
                        <p>Kelas: {{ $transaksi->kelas }}</p>
                        <p>{{ $transaksi->jumlah }} Tiket</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
