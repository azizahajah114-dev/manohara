<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\VariasiProduk;
use App\Models\Sewa;
use App\Models\DetailSewa;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserSewaController extends Controller
{
    // untuk sewa pada user
    //form sewa
    public function create($id)
    {
        // Ambil produk berdasarkan id
        $produk = Produk::with('variasi')->findOrFail($id);

        // ambil daftar warna & ukuran
        $warna = $produk->variasi->pluck('warna')->filter()->unique();
        $ukuran = $produk->variasi->pluck('ukuran')->filter()->unique();

        $variasi = $produk->variasi;
        return view('users.sewa.sewa', compact('produk', 'warna', 'ukuran', 'variasi'));
    }

    //input sewa
    public function confirm(Request $request, $id)
    {

        $request->validate([
            'id_variasi' => 'required|exists:variasi_produk,id',
            'alamat_pengiriman' => 'required|string|max:255',
            'tgl_sewa' => 'required|date|after_or_equal:today',
            'tgl_kembali' => 'required|date|after:tgl_sewa',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::with('variasi')->findOrFail($id);
        $variasi = VariasiProduk::findOrFail($request->id_variasi);
        $jumlahSewa = $request->jumlah;

        //cek stok tersedia sblm konfirmasi
        if($variasi->stok < $jumlahSewa){
            return redirect()->back()->withErrors(['id_variasi' => 'Stok untuk variasi yang dipilih tidak tersedia. Silakan pilih variasi lain.'])->withInput();
        }

        //hitung durasi hari
        $tglSewa = Carbon::parse($request->tgl_sewa);
        $tglKembali = Carbon::parse($request->tgl_kembali);
        $durasi = max(1, $tglSewa->diffInDays($tglKembali)); // minimal 1 hari

        //hitung total harga sewa
        $biayaBarang = $durasi * $produk->harga * $jumlahSewa;
        $ongkir = 20000;

        // Total harga (barang + ongkir)
        $total = $biayaBarang + $ongkir;

       

        //data 
        $data = [
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'tgl_sewa' => $tglSewa,
            'tgl_kembali' => $tglKembali,
            'durasi_sewa' => $durasi,
            'id_variasi' => $request->id_variasi,
            'biaya_barang' => $biayaBarang,
            'ongkir' => $ongkir,
            'total_harga' => $total,
            'jumlah' => $jumlahSewa
        ];

        return view('users.sewa.konfirmasi', compact('produk', 'variasi', 'data'));
    }

    // Simpan ke database setelah konfirmasi
        public function store(Request $request, $id)
    {
        $request->validate([
            'id_variasi' => 'required|exists:variasi_produk,id',
            'alamat_pengiriman' => 'required|string|max:255',
            'tgl_sewa' => 'required|date|after_or_equal:today',
            'tgl_kembali' => 'required|date|after:tgl_sewa',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($id);
        $variasi = VariasiProduk::findOrFail($request->id_variasi);
        $jumlahSewa = $request->jumlah;

        //cek stok
        if($variasi->stok < $jumlahSewa){
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah sewa melebihi stok yang tersedia.'])->withInput();
        }

        $tglSewa = Carbon::parse($request->tgl_sewa);
        $tglKembali = Carbon::parse($request->tgl_kembali);
        $durasi = max(1, $tglSewa->diffInDays($tglKembali)); // minimal 1 hari

        //hitung barang
        $biayaBarang = $durasi * $produk->harga * $jumlahSewa;
        $ongkir = 20000;
        $total = $biayaBarang + $ongkir;

        //kurangi dan tambah stok
        $variasi->stok -= $jumlahSewa;
        $variasi->save();

        // Simpan ke tabel sewa
        $sewa = Sewa::create([
            'id_user' => Auth::id(),
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'tgl_sewa' => $tglSewa,
            'tgl_kembali' => $tglKembali,
            'durasi_sewa' => $durasi,
            'biaya_barang' => $biayaBarang,
            'ongkir' => $ongkir,
            'total_harga' => $total,
            'status_sewa' => 'menunggu',
            // 'bukti_pembayaran' => null //ini default kosong
        ]);

        // Simpan detail sewa
        DetailSewa::create([
            'id_sewa' => $sewa->id,
            'id_produk' => $produk->id,
            'id_variasi' => $variasi->id,
            'jumlah' => $jumlahSewa, // Ambil jumlah dari request
            'harga' => $produk->harga
        ]);

        // Ubah redirect agar tidak menyertakan parameter yang tidak diperlukan
        return redirect()->route('users.riwayat.index')->with('success', 'Sewa berhasil dibuat, silakan upload bukti pembayaran.');
    }

    //masuk ke riwayat sewa untuk upload 
    public function riwayatSewa()
    {
        $userId = Auth::id();

        $sewa = Sewa::with(['detailSewa.variasi.produk'])
            ->where('id_user', $userId)
            ->latest()
            ->get();

        return view('users.riwayat.index', compact('sewa'));
    }

    //ke datail riwayat 
    public function detailSewa($id)
    {
        $sewa = Sewa::with(['detailSewa.variasi.produk'])
            ->where('id', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        return view('users.riwayat.detail', compact('sewa'));
    }

    //unutk upload bukti pembayaran
    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $sewa = Sewa::where('id', $id)->where('id_user', Auth::id())->firstOrFail();

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        $sewa->update([
            'bukti_pembayaran' => $path,
            'status_sewa' => 'dibayar'
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload, tunggu konfirmasi admin.');
    }

    //cansel jika status masih menunggu
    public function cancelSewa($id)
    {
        $sewa = Sewa::Where('id', $id)
            ->Where('id_user', Auth::id())
            ->Where('status_sewa', 'menunggu')
            ->firstOrFail();

        //ubah status sewa jdi dibatalkan
        $sewa->update(['status_sewa' => 'dibatalkan']);

        return redirect()->back()->with('success', 'Sewa berhasil dibatalkan.');
    }

    //tamppilan untuk form upload bukti pengembalian
    public function showBuktiPengembalian($id)
    {
        $sewa = Sewa::with('detailSewa.produk', 'detailSewa.variasi', 'pengembalian')
            ->where('id', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        return view('users.riwayat.pengembalian', compact('sewa'));
    }

    //untuk proses pengembalian
    public function uploadBuktiPengembalian(Request $request, $id)
    {
        $request->validate([
            'bukti_pengembalian' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $sewa = Sewa::with('pengembalian')->findOrFail($id);

        if ($sewa->status_sewa !== 'disewa') {
            return redirect()->back()->with('error', 'Status sewa tidak valid untuk pengembalian.');
        }

        //simpan bukti ke path
        $path = $request->file('bukti_pengembalian')->store('bukti_pengembalian', 'public');

        try {
            DB::beginTransaction();

            //perbarui status sewa jadi 'proses_pengembalian'
            $sewa->update(['status_sewa' => 'proses_pengembalian']);

            //simpan bukti pengembalian
            Pengembalian::create([
                'id_sewa' => $sewa->id,
                'tgl_pengembalian' => Carbon::now(),
                'bukti_pengembalian' => $path
            ]);

            DB::commit();

            return redirect()->route('riwayat.pengembalian', $sewa->id)->with('success', 'Bukti pengembalian berhasil diupload.');
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::disk('public')->delete($path);
            return redirect()->back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }
}
