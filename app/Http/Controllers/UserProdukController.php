<?php

//ini untuk produk ++ detail produk
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProdukController extends Controller
{
    ///buat di detail produk/list of items
    public function index(Request $request)
    {
        // Ambil parameter kategori (kalau ada)
        $kategoriId = $request->get('kategori');
        $bestSeller = (int) $request->get('best_seller', 0);

        // Ambil produk dengan relasi kategori
        $query = Produk::with('kategori');

         // Filter best seller dulu
        if ($bestSeller) {
            $query->where('best_seller', 1);
        }

        // Kalau ada kategori yang dipilih → filter
        if ($kategoriId) {
            $query->where('id_kategori', $kategoriId);
        }

        $produk   = $query->get();          // daftar produk (sudah difilter kalau ada)
        $kategori = Kategori::all();        // daftar semua kategori untuk menu filter

        return view('users.product', compact('produk', 'kategori', 'kategoriId', 'bestSeller'));
    }

    public function show($id)
    {
        // Ambil produk berdasarkan id dan ulasan
        $produk = Produk::with('kategori', 'ulasan.user')->findOrFail($id);

        //menghitung rata-rata rating
        $averageRating = $produk->ulasan->avg('rating');
        $reviewCount = $produk->ulasan->count();

        return view('users.detail', compact('produk', 'averageRating', 'reviewCount'));
    }
}
