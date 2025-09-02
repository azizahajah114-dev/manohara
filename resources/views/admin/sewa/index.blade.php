<title>Manajemen sewa</title>
<x-layout>
    <div class="bg-white rounded-lg shadow p-4 border mt-[50px] w-full items-center justify-between">
        {{-- <div class="flex justify-end">
            <a href="" 
            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition"></a>
        </div> --}}
        <h2 class="text-sm font-semibold text-gray-600 mb-4">Data Sewa</h2>
        <div class="overflow-x-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <table class="w-full border-collapse text-sm">
                <thead class="bg-[#E3E9D2] border-b">
                    <tr>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">No</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Produk</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Variasi</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Tgl Sewa</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Tgl Kembali</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Penyewa</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Alamat</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Total Harga</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Bukti Pembayaran</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Status</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Catatan Penolakan</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach($sewa as $row)
                    <tr>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">{{ $no++ }}</td>
                        @foreach ($row->detailSewa as $detail)
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $detail->produk?->nama_produk }}</td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">
                                {{ $detail->variasi->warna }}-{{ $detail->variasi->ukuran }}
                            </td>
                        @endforeach
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->tgl_sewa }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->tgl_kembali }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{$row->user->name}}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->alamat_pengiriman }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->total_harga }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">
                            @if ($row->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $row->bukti_pembayaran) }}" target="_blank">
                                <img src="{{ asset('storage/' . $row->bukti_pembayaran) }}" class="text-blue-500 hover:underline">
                                </a>
                            @else
                                Belum Upload
                            @endif
                        </td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">
                            <span class="
                                {{ $row->status_sewa == 'menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                {{ $row->status_sewa == 'dibayar' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $row->status_sewa == 'diproses' ? 'bg-indigo-100 text-indigo-700' : '' }}
                                {{ $row->status_sewa == 'disewa' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $row->status_sewa == 'proses_pengembalian' ? 'bg-purple-100 text-purple-700' : '' }}
                                {{ $row->status_sewa == 'selesai' ? 'bg-gray-100 text-gray-700' : '' }}
                                {{ $row->status_sewa == 'dibatalkan' ? 'bg-red-100 text-red-700' : '' }}
                                {{ $row->status_sewa == 'ditolak' ? 'bg-red-200 text-red-800' : '' }}
                                ">
                                {{ucfirst($row->status_sewa)}}
                            </span>
                        </td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">
                            @if ($row->status_sewa == 'ditolak')
                                {{$row->catatan_penolakan}}
                                @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">
                            @if ($row->status_sewa == 'diproses')
                                <form action="{{ route('sewa.setSewa', $row->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:text-green-900">Sewa</button>
                                </form>
                            {{-- @elseif ($row->status_sewa == 'proses_pengembalian')
                                <form action="{{ route('sewa.Selesai', $row->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:text-green-900">Selesaikan</button>
                                </form> --}}
                            @endif
                            <a href="{{ route('sewa.detail', $row->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>