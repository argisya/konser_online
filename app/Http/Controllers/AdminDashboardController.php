<?php
namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\PaketKonser;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik angka
        $totalKonser = Concert::count();
        $totalPaket = PaketKonser::count();
        $totalTransaksi = Transaction::count();
        $totalPendapatan = Transaction::sum('total_harga');

        // Transaksi terbaru (limit 5)
        $transaksiBaru = Transaction::latest()->take(5)->get();

        // Notifikasi stok menipis
        $stokHampirHabis = PaketKonser::where('stok', '<=', 10)->get();

        // Grafik data (penjualan per bulan)
        $grafik = Transaction::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        // Format untuk grafik
        $bulanList = [];
        $totalList = [];

        $namaBulanIndo = [
            1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr",
            5 => "Mei", 6 => "Jun", 7 => "Jul", 8 => "Agu",
            9 => "Sep", 10 => "Okt", 11 => "Nov", 12 => "Des"
        ];

        foreach ($grafik as $g) {
            $bulanList[] = $namaBulanIndo[$g->bulan];
            $totalList[] = $g->total;
        }
        
        return view('admin.dashboard', compact(
            'totalKonser',
            'totalPaket',
            'totalTransaksi',
            'totalPendapatan',
            'transaksiBaru',
            'stokHampirHabis',
            'bulanList',
            'totalList'
        ));
    }
}
