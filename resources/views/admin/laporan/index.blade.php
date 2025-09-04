<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#F3C327]">Laporan Sewa</h1>
    <hr>

        {{-- Filter tanggal --}}
    <div class="border-solid border-2 border-[#819A91] rounded-sm p-4 shadow-md">
        <form action="{{ route('laporan.index') }}" method="get" class="flex flex-wrap gap-4 items-end">
            <div>
                <label for="tanggal_awal" class="block font-semibold text-gray-700">Tanggal Awal</label>
                <input type="date" class="form-control border border-[#819A91] rounded-md px-3 py-2" id="tanggal_awal" name="tanggal_awal">
            </div>
            <div>
                <label for="tanggal_akhir" class="block font-semibold text-gray-700">Tanggal Akhir</label>
                <input type="date" class="form-control border border-[#819A91] rounded-md px-3 py-2" id="tanggal_akhir" name="tanggal_akhir">
            </div>
            <div>
                <button type="submit" class="bg-[#6D9280] hover:bg-[#557866] text-white font-semibold py-2 px-5 rounded-md shadow">
                    Lihat Laporan
                </button>
            </div>
        </form>
    </div>

    <div class="border-[#819A91] border-2 border-solid p-4 mt-8  rounded-sm shadow-md">
        <div class="bg-[#F4F0F1] border-b border-[#819A91] px-4 py-2">
            <h2 class="text-sm font-semibold text-gray-700">
                LAPORAN SEWA TANGGAL {{ \Carbon\Carbon::parse(request('tanggal_awal'))->format('d-m-Y') }}
                SAMPAI {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->format('d-m-Y') }}
            </h2>
        </div>
        @if (request('tanggal_awal') && request('tanggal_akhir'))
        
        <div class="mt-3">
            <div class=" w-full overflow-x-auto rounded-sm shadow-lg">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">No</th>
                            <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Penyewa</th>
                            <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Produk</th>
                            <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Variasi</th>
                            <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Tanggal Sewa</th>
                            <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                      @foreach ($laporan as $sewa)
                        @foreach ($sewa->detailSewa as $detail)
                            <tr>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $no++ }}</td>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $sewa->user?->name }}</td>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $detail->produk?->nama_produk }}</td>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $detail->variasi->warna }}-{{ $detail->variasi->ukuran }}</td>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $sewa->tgl_sewa }}</td>
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $sewa->total_harga }}</td>
                            </tr>
                        @endforeach
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        
        <div class="mt-4">
                    <a href="{{ route('laporan.pdf', request()->query()) }}" class="btn btn-danger bg-[#6D9280] hover:bg-[#557866] text-white py-2 px-5 rounded-md">Export PDF</a>
        </div>  
        @endif
    </div>
</x-layout>