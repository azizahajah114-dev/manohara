@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="bg-[#D1D8BE] font-sans">
<x-header-user></x-header-user>
  <div class="max-w-7xl mx-auto py-10 px-5">
    <h1 class="text-4xl font-bold text-[#555] mb-8">Riwayat Sewa</h1>

    <div class="overflow-x-auto bg-white rounded-2xl shadow-lg border border-[#A7C1A8]">
      <table class="w-full text-lg text-gray-700">
        <thead class="bg-[#819A91] text-white">
          <tr>
            <th class="px-6 py-4 text-left">No</th>
            <th class="px-6 py-4 text-left">Produk</th>
            <th class="px-6 py-4 text-left">Variasi</th>
            <th class="px-6 py-4 text-left">Tanggal Sewa</th>
            <th class="px-6 py-4 text-left">Tanggal Kembali</th>
            <th class="px-6 py-4 text-left">Durasi</th>
            <th class="px-6 py-4 text-left">Biaya Barang</th>
            <th class="px-6 py-4 text-left">Biaya Kirim</th>
            <th class="px-6 py-4 text-left">Total Biaya</th>
            <th class="px-6 py-4 text-left">Bukti Pembayaran</th>
            <th class="px-6 py-4 text-left">Bukti Pengembalian</th>
            <th class="px-6 py-4 text-left">Status</th>
            <th class="px-6 py-4 text-center">Opsi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @php
            $no = 1;
          @endphp
          @foreach ($sewa as $row)
          @php
            $detail = $row->detailSewa->first();
          @endphp
          <tr class="hover:bg-[#F4F6F2]">
            <td class="px-6 py-4">{{ $no++ }}</td>
            <td class="px-6 py-4 font-semibold">
              @if($detail && $detail->variasi && $detail->variasi->produk)
                  {{ $detail->variasi->produk->nama_produk }}
              @else
                  Produk tidak ditemukan
              @endif
            </td>
            <td class="px-6 py-4">
              @if($detail && $detail->variasi)
                    {{ $detail->variasi->warna }}, {{ $detail->variasi->ukuran }}
                @else
                    Variasi tidak ditemukan
              @endif
            </td>
            <td class="px-6 py-4">{{ $row->tgl_sewa }}</td>
            <td class="px-6 py-4">{{ $row->tgl_kembali }}</td>
            <td class="px-6 py-4">{{ $row->durasi_sewa }} Hari</td>
            <td class="px-6 py-4">Rp {{ number_format($row->biaya_barang, 0, ',', '.') }}</td>
            <td class="px-6 py-4">Rp {{ number_format($row->ongkir, 0, ',', '.') }}</td>
            <td class="px-6 py-4 font-bold">Rp {{ number_format($row->total_harga, 0, ',', '.') }}</td>
            <td class="px-6 py-4">
              @if ($row->bukti_pembayaran)
                <a href="{{ asset('storage/' . $row->bukti_pembayaran) }}" target="_blank">
                  <img src="{{ asset('storage/' . $row->bukti_pembayaran) }}" class="text-blue-500 hover:underline">
                </a>
              @else
                Belum Upload
              @endif
            </td>
            <td class="px-6 py-4">
               @if ($row->pengembalian && $row->pengembalian->bukti_pengembalian)
                <a href="{{ asset('storage/' . $row->pengembalian->bukti_pengembalian) }}" target="_blank">
                  <img src="{{ asset('storage/' . $row->pengembalian->bukti_pengembalian) }}" class="text-blue-500 hover:underline">
                </a>
                <span class="text-gray-500 text-xs mt-1">Bukti Pengembalian</span>
              @endif
            </td>
            <td class="px-6 py-4">
              <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                {{$row->status_sewa == 'menunggu' ? 'bg-yellow-100 text-yellow-700' : ''}}
                {{$row->status_sewa == 'dibayar' ? 'bg-blue-100 text-blue-700' : ''}}
                {{$row->status_sewa == 'diproses' ? 'bg-indigo-100 text-indigo-700' : ''}}
                {{$row->status_sewa == 'disewa' ? 'bg-green-100 text-green-700' : ''}}
                {{$row->status_sewa == 'proses_pengembalian' ? 'bg-purple-100 text-purple-700' : ''}}
                {{$row->status_sewa == 'selesai' ? 'bg-gray-100 text-gray-700' : ''}}
                {{$row->status_sewa == 'dibatalkan' ? 'bg-red-100 text-red-700' : ''}}
                {{$row->status_sewa == 'ditolak' ? 'bg-red-200 text-red-800' : ''}}
              ">
              {{ ucfirst(str_replace('_', ' ', $row->status_sewa)) }}
              </span>

              {{-- catatan apabila sewa ditolak --}}
              @if ($row->status_sewa == 'ditolak')
                  <p class="mt-2 text-sm text-red-600 italic">
                    Catatan :{{$row->catatan_penolakan}}
                  </p>
              @endif
            </td>

            <td class="px-6 py-4 text-center space-x-2">
              <a href="{{route('riwayat.detail', $row->id)}}" 
                class="px-4 py-2 text-sm bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">
                Detail
              </a>
              @if ($row->status_sewa == 'menunggu')
                <form action="{{ route('riwayat.cancel', $row->id) }}" method="POST" class="inline">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600">
                    Batalkan
                  </button>
                </form>
              @endif
              
              @if ($row->status_sewa == 'disewa' && !$row->bukti_pengembalian)
                <a href="{{ route('riwayat.pengembalian', $row->id) }}" class="px-4 py-2 text-sm bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">
                  Upload Pengembalian
                </a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
      <x-footer-user></x-footer-user>
</body>