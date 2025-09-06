<title>Menunggu Konfirmasi</title>
<x-layout>
    <div class="border-solid border-2 border-[#819A91] shadow-md rounded-md p-4 mt-8 items-center justify-between">
        <div class="flex justify-between items-center px-4 py-3 bg-[#F4F0F1]">
            <h2 class="text-sm font-semibold text-[#F3C327]">Data Sewa Menunggu Konfirmasi</h2>
        </div>

        <div class="mt-3">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="w-full overflow-x-auto rounded-sm shadow-lg">
                @if($sewa->isEmpty())
                    <p class="text-center text-gray-500 py-4">Tidak ada data sewa menunggu konfirmasi.</p>
                @else
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-[#E3E9D2] border-b">
                        <tr>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">No</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Penyewa</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Produk</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Variasi</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Tgl Sewa</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Tgl Kembali</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Alamat</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Total Harga</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Bukti Pembayaran</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Status</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($sewa as $row)
                        <tr>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $no++ }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->user->name}}</td>
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
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{$row->alamat_pengiriman}}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{$row->total_harga}}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                <a href="{{ asset('storage/' . $row->bukti_pembayaran) }}">
                                    <img src="{{ asset('storage/' . $row->bukti_pembayaran) }}" alt="" class="w-16 h-16 object-cover rounded">
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
                                    {{ $row->status_sewa == 'dibatalkan' ? 'bg-red-100 text-red-700' : '' }}
                                    {{ $row->status_sewa == 'ditolak' ? 'bg-red-200 text-red-800' : '' }}">
                                    {{ ucfirst($row->status_sewa) }}
                                </span>
                            </td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                <form action="{{route('sewa.proses', ['id' => $row->id])}}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-[#6D9280] hover:bg-[#557866] text-white px-3 py-1 rounded">Proses</button>
                                </form>
                                <button onclick="openRejectModal({{ $row->id }}, '{{route('sewa.tolak', $row->id)}}')" class="ml-2 text-red-600 hover:text-red-900">Tolak</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

    <div id="rejectModal" class="hidden">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full content-center flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96">
            <h3 class="text-lg font-bold mb-4 text-center">Tolak Sewa</h3>
            <form action="" id="rejectForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="catatan_penolakan" class="block text-sm font-medium text-gray-700">Catatan Penolakan</label>
                    <textarea name="catatan_penolakan" id="catatan_penolakan" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeRejectModal()" class="px-4 py-2 bg-gray-200 rounded-md text-gray-800 hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 rounded-md text-white hover:bg-red-700">Kirim</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    
    <script>
        function openRejectModal(id, url) {
            const modal = document.getElementById('rejectModal');
            const form = document.getElementById('rejectForm');
            form.action =url; // Sesuaikan dengan rute Anda
            modal.classList.remove('hidden');
        }

        function closeRejectModal() {
            const modal = document.getElementById('rejectModal');
            modal.classList.add('hidden');
        }
    </script>
</x-layout>