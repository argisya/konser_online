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
        $bulanKonser = [];
        $jumlahTransaksiPerBulan = [];

        for ($i = 11; $i >= 0; $i--) {
            $bulan = now()->subMonths($i);
            $bulanKonser[] = $bulan->format('M Y');

            $count = Transaksi::whereYear('created_at', $bulan->year)->whereMonth('created_at', $bulan->month)->count();
            $jumlahTransaksiPerBulan[] = $count;
        }

        return view('admin.dashboard', [
            'jumlahKonser' => Konser::count(),
            'totalTransaksi' => Transaksi::count(),
            'totalPendapatan' => Transaksi::sum('total') ?? 0,
            'tanggalTerakhir' => Konser::latest('created_at')->first()?->created_at->format('d-m-Y') ?? 'N/A',
            'bulanKonser' => $bulanKonser,
            'jumlahTransaksiPerBulan' => $jumlahTransaksiPerBulan
        ]);
    }
}
