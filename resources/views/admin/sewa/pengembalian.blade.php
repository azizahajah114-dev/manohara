<title>Pengembalian</title>
<x-layout>
    <div class="bg-white rounded-lg shadow p-4 border mt-[50px] w-[140vh] items-center justify-between">
        <div class="overflow-x-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <table class="w-full border-collapse text-sm">
                <thead class="bg-[#E3E9D2] border-b">
                    <tr>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">No</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Penyewa</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Produk</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Variasi</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Tanggal Sewa</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Tanggal Kembali</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Bukti Pengembalian</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Status</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Aksi</td>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($sewa as $row)
                        @php
                        $no = 1;
                    @endphp
                    <tr>
                        @if ($sewa->isEmpty())
                            <td colspan="8" class="text-center py-4 text-gray-500">Tidak ada data pengembalian barang.</td>
                        @else
                            <td class="px-3 py-2 text-left font-semibold tet-gray-700">{{$no++}}</td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->user->name ?? 'user goib'}}</td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">
                                @foreach ($row->detailSewa as $detail)
                                    {{$detail->produk?->nama_produk }}
                                @endforeach
                            </td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">
                                @foreach ($row->detailSewa as $detail)
                                    {{$detail->variasi->warna }} - {{$detail->variasi->ukuran}}
                                @endforeach
                            </td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->tgl_sewa }}</td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->tgl_kembali }}</td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">
                            
                                    <a href="{{ asset('storage/' . $row->bukti_pengembalian) }}" target="_blank" class="text-blue-500 hover:underline">
                                        <img src="{{asset('storage/' . $row->bukti_pengembalian)}}" alt="Bukti Pengembalian" class="w-16 h-16 object-cover rounded-md">
                                    </a>
                            </td>
                            <td class="px-3 py-2 text-left font-semibold text-gray-800">
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
                            <td>
                                <form action="{{route('sewa.selesai', $row->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Selesaikan</button>
                                </form>
                            </td>
                        @endif
                        
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>

    {{-- <script>
        document.addEvenListener('DOMContentLoaded', function (){

        })
    </script> --}}
</x-layout>