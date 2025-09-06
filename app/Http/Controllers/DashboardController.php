<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        //hari
        $day = Carbon::now()->format('l'); 
        //tanggal 
        $date = Carbon::now()->format('d F Y');

        // Hitung jumlah total pengguna 
        $totalUser = User::count();
        $totalProduk = Produk::count();

        //transaksi
        $transaksiHariIni = Sewa::whereDate('created_at', now())->count();

        $menungguKonfirmasi = Sewa::where('status_sewa', 'dibayar')->count();
        $pengembalian = Sewa::where('status_sewa', 'pengembalian')->count();
        

        return view('admin.dashboard_admin', compact('totalUser', 'totalProduk', 'transaksiHariIni', 'menungguKonfirmasi',
            'pengembalian', 'day', 'date'));
    }
}
