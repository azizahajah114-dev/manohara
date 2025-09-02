<?php

namespace App\Http\Controllers\Variasi;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\VariasiProduk;
use Illuminate\Http\Request;

class VariasiController extends Controller
{
    // LIST variasi per-produk (admin)
    public function index()
    {
        $variasi  = VariasiProduk::OrderBy('created_at', 'asc')->get();
        // $variasi = VariasiProduk::with('produk')->latest()->get();
        return view('admin.variasi.index', compact('variasi'));
    }

    // FORM TAMBAH variasi
    public function create()
    {
        $produk = Produk::all(); // biar bisa pilih produk
        return view('admin.variasi.create', compact('produk'));
    }

    // SIMPAN variasi
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            'warna'     => 'nullable|string|max:100',
            'ukuran'    => 'nullable|string|max:100',
            'stok'      => 'required|integer|min:0',
        ]);

        VariasiProduk::create($request->all());

        return redirect()->route('variasi.index')->with('success', 'Variasi berhasil ditambahkan!');
    }

    // FORM EDIT variasi
    public function edit(VariasiProduk $variasi)
    {
        $produk = Produk::all();
        return view('admin.variasi.edit', compact('variasi','produk'));
    }

    // UPDATE variasi
    public function update(Request $request, VariasiProduk $variasi)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            'warna'     => 'nullable|string|max:100',
            'ukuran'    => 'nullable|string|max:100',
            'stok'      => 'required|integer|min:0',
        ]);

        $variasi->update($request->all());

        return redirect()->route('variasi.index')->with('success', 'Variasi berhasil diperbarui!');
    }

    // HAPUS variasi
    public function destroy(VariasiProduk $variasi)
    {
        $variasi->delete();
        return redirect()->route('variasi.index')->with('success', 'Variasi berhasil dihapus!');
    }

    // LIST variasi untuk halaman detail produk (user)
    public function showByProduk($id_produk)
    {
        $produk  = Produk::findOrFail($id_produk);
        $variasi = VariasiProduk::where('id_produk', $id_produk)->get();

        return view('user.produk.detail', compact('produk','variasi'));
    }
}
