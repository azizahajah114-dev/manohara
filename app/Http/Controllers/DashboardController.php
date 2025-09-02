<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah total pengguna dari tabel 'users'
        $userCount = User::count();

        // Hitung jumlah total produk dari tabel 'produks'
        $productCount = Produk::count();

        // Kirimkan kedua variabel ke view 'admin.dashboard_admin'
        // Dengan menggunakan compact, variabel $userCount dan $productCount 
        // akan tersedia di dalam view
        return view('admin.dashboard_admin', compact('userCount', 'productCount'));
    }
}