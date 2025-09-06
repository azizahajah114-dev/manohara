<title>Manajemen sewa</title>
<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Manajement <span class="text-[#F3C327]">Sewa</span></h1>
    <div class="border-solid border-2 border-[#819A91] shadow-md rounded-md p-4 mt-8 items-center justify-between">
        <div class="flex justify-between items-center px-4 py-3 bg-[#F4F0F1]">
            <h2 class="text-sm font-semibold text-[#F3C327]">Data Sewa</h2>
            
        </div>
        <div class="mt-3">
            {{-- @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif --}}
            <div class="w-full overflow-x-auto rounded-sm shadow-lg">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-[#E3E9D2] border-b">
                        <tr>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">No</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Produk</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Variasi</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Tgl Sewa</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Tgl Kembali</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Penyewa</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Alamat</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Total Harga</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Bukti Pembayaran</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Status</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Catatan Penolakan</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach($sewa as $row)
                        <tr>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $no++ }}</td>
                            @foreach ($row->detailSewa as $detail)
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $detail->produk?->nama_produk }}</td>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                    {{ $detail->variasi->warna }}-{{ $detail->variasi->ukuran }}
                                </td>
                            @endforeach
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->tgl_sewa }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->tgl_kembali }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{$row->user->name}}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->alamat_pengiriman }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->total_harga }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                @if ($row->bukti_pembayaran)
                                    <a href="{{ asset('storage/' . $row->bukti_pembayaran) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $row->bukti_pembayaran) }}" class="w-16 h-16 object-cover rounded">
                                    </a>
                                @else
                                    Belum Upload
                                @endif
                            </td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                <span class=" px-3 py-1 text-sm rounded-full
                                    {{ $row->status_sewa == 'menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $row->status_sewa == 'dibayar' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $row->status_sewa == 'diproses' ? 'bg-indigo-100 text-indigo-700' : '' }}
                                    {{ $row->status_sewa == 'disewa' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $row->status_sewa == 'proses_pengembalian' ? 'bg-purple-100 text-purple-700' : '' }}
                                    {{ $row->status_sewa == 'selesai' ? 'bg-gray-100 text-gray-700' : '' }}
                                    {{ $row->status_sewa == 'dibatalkan' ? 'bg-red-100 text-red-700' : '' }}
                                    {{ $row->status_sewa == 'ditolak' ? 'bg-red-200 text-red-800' : '' }}
                                    ">
                                    {{ ucfirst($row->status_sewa) }}
                                </span>
                            </td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                @if ($row->status_sewa == 'ditolak')
                                    {{$row->catatan_penolakan}}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                @if ($row->status_sewa == 'diproses')
                                    <form action="{{ route('sewa.setSewa', $row->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600 hover:text-green-900">Sewa</button>
                                    </form>
                                @endif
                                <a href="{{ route('sewa.detail', $row->id) }}" class="text-[#6D9280] hover:text-[#557866]">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif