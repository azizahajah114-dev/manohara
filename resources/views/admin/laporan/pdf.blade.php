

<style>
    table{
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 12px;
    }
    th, td{
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }
    th{
        background: #f2f2f2;
    }
    .kop td{
        border: none
    }
    hr.double{
        border-top: 3px double #000;
    }
</style>

{{-- kop surat --}}
<table class="kop" width="100%">
        <tr>
            <td width="80" align="center">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('asset/logo1.png'))) }}" 
     style="width:80px; height:auto;">
            </td>
            <td align="center">
                <h2 style="margin: 0;">ManoharaGiri</h2>
                <p style="margin: 2px 0;">Jl. Gunung Merbabu No. 12, Yogyakarta</p>
                <p style="margin: 2px 0;">Telp: 0812-3456-7890 | Email: info@manoharagiri.com</p>
            </td>
        </tr>
</table>
<hr class="double">

{{-- judul --}}
<h2>Laporan Sewa</h2>
@if (request('tanggal_awal') && request('tanggal_akhir'))
    <p>Periode: {{ request('tanggal_awal') }} s/d {{ request('tanggal_akhir') }}</p>
@endif

{{-- tabel lporan --}}
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Penyewa</th>
            <th>Produk</th>
            <th>Variasi</th>
            <th>Tanggal Sewa</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($laporan as $sewa)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sewa->user?->name}}</td>
                @foreach ($sewa->detailSewa as $detail)
                    <td>{{$detail->produk?->nama_produk}}</td>
                    <td>{{$detail->variasi->warna}}-{{$detail->variasi->ukuran}}</td>
                    <td>{{$sewa->tgl_sewa}}</td>
                    <td>{{$sewa->total_harga}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>