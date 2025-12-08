<?php
namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
        'jumlahKonser' => Konser::count(),
        'totalTransaksi' => Transaksi::count(),
        'totalPendapatan' => Transaksi::sum('total'),
        'tanggalTerakhir' => Konser::latest()->value('tanggal'),
        'bulanKonser' => Transaksi::selectRaw('MONTHNAME(created_at) as bulan')->groupBy('bulan')->pluck('bulan'),
        'jumlahTransaksiPerBulan' => Transaksi::selectRaw('COUNT(*) as total')->groupByRaw('MONTH(created_at)')->pluck('total'),
    ]);
    }
}
