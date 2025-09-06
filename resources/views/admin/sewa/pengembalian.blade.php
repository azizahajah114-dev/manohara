<title>Pengembalian</title>
<x-layout>
    <div class="border-solid border-2 border-[#819A91] shadow-md rounded-md p-4 mt-8 items-center justify-between">
        <div class="flex justify-between items-center px-4 py-3 bg-[#F4F0F1]">
            <h2 class="text-sm font-semibold text-[#F3C327]">Data Pengembalian</h2>
        </div>
        <div class="mt-3">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="w-full overflow-x-auto rounded-sm shadow-lg">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-[#E3E9D2] border-b">
                        <tr>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">No</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Penyewa</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Produk</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Variasi</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Tanggal Sewa</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Tanggal Kembali</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Bukti Pengembalian</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Status</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($sewa as $row)
                            @if ($sewa->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-gray-500">Tidak ada data pengembalian barang.</td>
                                </tr>
                            @else
                                <tr>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-700">{{$no++}}</td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->user->name ?? 'user goib'}}</td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                        @foreach ($row->detailSewa as $detail)
                                            {{$detail->produk?->nama_produk }}
                                        @endforeach
                                    </td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                        @foreach ($row->detailSewa as $detail)
                                            {{$detail->variasi->warna }} - {{$detail->variasi->ukuran}}
                                        @endforeach
                                    </td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->tgl_sewa }}</td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->tgl_kembali }}</td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                        <a href="{{ asset('storage/' . $row->bukti_pengembalian) }}" target="_blank" class="text-blue-500 hover:underline">
                                            <img src="{{asset('storage/' . $row->bukti_pengembalian)}}" alt="Bukti Pengembalian" class="w-16 h-16 object-cover rounded-md">
                                        </a>
                                    </td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                        <span class="px-3 py-1 text-sm rounded-full
                                            {{ $row->status_sewa == 'menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                            {{ $row->status_sewa == 'dibayar' ? 'bg-blue-100 text-blue-700' : '' }}
                                            {{ $row->status_sewa == 'diproses' ? 'bg-indigo-100 text-indigo-700' : '' }}
                                            {{ $row->status_sewa == 'disewa' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $row->status_sewa == 'proses_pengembalian' ? 'bg-purple-100 text-purple-700' : '' }}
                                            {{ $row->status_sewa == 'selesai' ? 'bg-gray-100 text-gray-700' : '' }}
                                            ">
                                            {{ ucfirst(str_replace('_', ' ', $row->status_sewa)) }}
                                        </span>
                                    </td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                        <form action="{{route('sewa.selesai', $row->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-[#6D9280] text-white px-4 py-2 rounded hover:bg-[#557866] transition">Selesaikan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>