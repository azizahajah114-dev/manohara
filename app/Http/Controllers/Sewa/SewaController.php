<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VariasiProduk;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{
    //data sewa
    public function index()
    {
        $sewa = Sewa::with('user', 'detailSewa.produk', 'detailSewa.variasi')->latest()->get();
        return view('admin.sewa.index', compact('sewa'));
    }
    //untuk detail data sewa
    public function showDetail($id)
    {
        $sewa = Sewa::with('user', 'detailSewa.produk', 'detailSewa.variasi')
            ->where('id', $id)
            ->firstOrFail();
        return view('admin.sewa.detail-sewa', compact('sewa'));
    }

    //untuk validasi
    public function menungguKonfirmasi()
    {
        $sewa = Sewa::with('user', 'detailSewa.produk', 'detailSewa.variasi')
            ->where('status_sewa', 'dibayar')
            ->latest()
            ->get();
        return view('admin.sewa.menunggu', compact('sewa'));
    }

    //proses penyewaan dri admin ke user
    public function prosesSewa($id)
    {
        $sewa = Sewa::findOrFail($id);
        
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Perbarui status sewa menjadi 'diproses'
            $sewa->update([
                'status_sewa' => 'diproses',
            ]);

            // Kurangi stok untuk setiap variasi yang disewa
            foreach ($sewa->detailSewa as $detail) {
                $variasi = VariasiProduk::find($detail->id_variasi);
                if ($variasi) {
                    // Pastikan stok tidak menjadi negatif
                    if ($variasi->stok >= $detail->jumlah) {
                        $variasi->stok -= $detail->jumlah;
                        $variasi->save();
                    } else {
                        throw new \Exception('Stok tidak mencukupi untuk produk ' . $variasi->produk->nama_produk . ' dengan variasi ' . $variasi->warna);
                    }
                }
            }

            // Commit transaksi jika semua berhasil
            DB::commit();
            return redirect()->route('sewa.menunggu')->with('success', 'Status sewa berhasil diperbarui dan stok dikurangi.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan
            DB::rollBack();
            return redirect()->route('sewa.menunggu')->with('error', 'Gagal memproses sewa: ' . $e->getMessage());
        }

        
    }

    //ini buat status sewa apabila barang telah disewa
    public function setSewa($id)
    {
        $sewa = Sewa::with('detailSewa.variasi')->findOrFail($id);
        $sewa->update([
            'status_sewa' => 'disewa',
        ]);

        return redirect()->route('sewa.index')->with('success', 'Status sewa berhasil diperbarui.');
    }

    //tampilan daftar pengembalian jika user mengupload bukti pengembalian
    public function prosesPengembalian()
    {
        $sewa = Sewa::with('user', 'detailSewa.produk', 'detailSewa.variasi')
            ->where('status_sewa', 'proses_pengembalian')
            ->latest()
            ->get();

        return view('admin.sewa.pengembalian', compact('sewa'));
    }


    //apabila barang sudah di admin, validasi jadi 'selesai'
    public function selesaiSewa($id)
    {
        $sewa = Sewa::findOrFail($id);
        
        // Pastikan status sewa bukan 'selesai' untuk menghindari penambahan stok ganda
        if ($sewa->status_sewa == 'selesai') {
            return redirect()->back()->with('error', 'Pengembalian sudah dikonfirmasi.');
        }

        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Perbarui status sewa menjadi 'selesai'
            $sewa->update(['status_sewa' => 'selesai']);

            // Tambah stok untuk setiap variasi yang disewa
            foreach ($sewa->detailSewa as $detail) {
                $variasi = VariasiProduk::find($detail->id_variasi);
                if ($variasi) {
                    // Tambah stok variasi
                    $variasi->stok += $detail->jumlah;
                    $variasi->save();
                }
            }

            // Commit transaksi jika semua berhasil
            DB::commit();
            return redirect()->route('sewa.index')->with('success', 'Sewa berhasil diselesaikan dan stok telah dikembalikan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyelesaikan sewa: ' . $e->getMessage());
        }

        return redirect()->route('sewa.index')->with('success', 'Sewa berhasil diselesaikan.');
    }

    //unutk menolak sewa
    public function tolakSewa(Request $request, $id)
    {
        $request->validate([
            'catatan_penolakan' => 'required|string|max:255'
        ]);

        $sewa = Sewa::where('id', $id)
            ->where('status_sewa', 'dibayar')
            ->firstOrFail();

        $sewa->update([
            'status_sewa' => 'ditolak',
            'catatan_penolakan' => $request->catatan_penolakan
        ]);
        return redirect()->route('sewa.menunggu')->with('success', 'Sewa berhasil ditolak.');
    }
}
