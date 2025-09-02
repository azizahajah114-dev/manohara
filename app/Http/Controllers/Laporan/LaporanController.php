<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sewa;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    //halaman laporan
    public function index()
    {
        $laporan = Sewa::with('user', 'detailSewa.produk', 'detailSewa.variasi');

        //filter tanggal
        if (request('tanggal_awal') && request('tanggal_akhir')) {
            $laporan = $laporan->whereBetween('tgl_sewa', [request('tanggal_awal'), request('tanggal_akhir')]);
        }
        $laporan = $laporan->get();

        return view('admin.laporan.index', compact('laporan'));
    }

    //export pdf
    public function exportPdf(Request $request)
    {
        $laporan = Sewa::with('user', 'detailSewa.produk', 'detailSewa.variasi');

        //filter tanggal
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $laporan = $laporan->whereBetween('tgl_sewa', [$request->tanggal_awal, $request->tanggal_akhir]);
        }
        $laporan = $laporan->get();
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('laporan', 'tanggal_awal', 'tanggal_akhir'))
            ->setPaper('a4', 'portrait');

        // return $pdf->download('laporan_sewa.pdf');
        return $pdf->stream('laporan_sewa.pdf');
    }
}
