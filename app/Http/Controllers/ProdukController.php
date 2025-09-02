<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdukController extends Controller
{
    /**
     * Napilin Produk adminN!
     */
    public function index()
    {
        $produk = Produk::OrderBy('created_at', 'asc')->get();
        // $produk = Produk::with('kategori')->latest()->get();
        return view('admin.produk.index', compact('produk'));
    }

    //ini unruk manajemnt produk dn stok
    public function manajemen()
    {
        $produk = Produk::with('variasi')->latest()->get();
        return view('admin.produk.manajemen', compact('produk'));
    }

    //nampilin form untuk menambah produk baru 
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    /**
     * Menyimpan produk baru dan mengelola unggahan satu foto produk.
     */
    public function store(Request $request)
    {
        // Validasi data input, hanya untuk satu file foto produk
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            // Aturan validasi untuk satu file foto
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'best_seller' => 'nullable|boolean',
        ]);

        // Inisialisasi path foto dengan null
        $fotoPath = null;
        // Jika ada file foto yang diunggah, simpan ke storage
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
        }

        // Simpan data produk ke tabel 'produks', termasuk path foto
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'best_seller' => $request->best_seller ?? false,
            'foto' => $fotoPath,
        ]);

        if ($produk){
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
        }
        else{
            return redirect()->back()->with('error','Produk gagal ditambahkan');
        }
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Memperbarui produk yang ada dan mengganti foto produk yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            // Aturan validasi untuk satu file foto (nullable karena opsional saat update)
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'best_seller' => 'nullable|boolean',
        ]);

        // Ambil semua data dari request kecuali 'foto'
        $dataToUpdate = $request->except('foto');

        // Jika ada foto baru yang diunggah, lakukan proses penyimpanan
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada dan file-nya ada di storage
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            // Simpan foto baru dan tambahkan path ke array data yang akan diupdate
            $dataToUpdate['foto'] = $request->file('foto')->store('produk', 'public');
        }

        // Perbarui data produk utama dengan array data yang sudah disiapkan
        $produk->update($dataToUpdate);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Menghapus produk dan satu foto yang terkait dari storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
