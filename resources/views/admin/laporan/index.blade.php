<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Laporan Sewa</h1>
    <div class="bg-white rounded-lg shadow p-4 border mt-[50px] w-[140vh]">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{-- <h3 class="panel-title">Laporan Sewa</h3> --}}
                <form action="{{ route('laporan.index') }}" method="get" class="">
                    <div class="form-group justify-between flex m-2 mb-2 ">
                        <div class="">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                        </div>
                        <div class="">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary bg-[#6D9280] py-2 px-5 rounded-md">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (request('tanggal_awal') && request('tanggal_akhir'))
        <div>
            <h2 class="text-sm font-semibold text-gray-600 mb-4">Laporan Sewa</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="">No</th>
                            <th class="">Penyewa</th>
                            <th class="">Produk</th>
                            <th class="">Variasi</th>
                            <th class="">Tanggal Sewa</th>
                            <th class="">Total</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @php
                            $no = 1;
                        @endphp
                      @foreach ($laporan as $sewa)
                        @foreach ($sewa->detailSewa as $detail)
                            <tr>
                                <td class="px-3 py-2 text-center font-semibold text-gray-800">{{ $no++ }}</td>
                                <td class="px-3 py-2 text-center font-semibold text-gray-800">{{ $sewa->user?->name }}</td>
                                <td class="px-3 py-2 text-center font-semibold text-gray-800">{{ $detail->produk?->nama_produk }}</td>
                                <td class="px-3 py-2 text-center font-semibold text-gray-800">{{ $detail->variasi->warna }}-{{ $detail->variasi->ukuran }}</td>
                                <td class="px-3 py-2 text-center font-semibold text-gray-800">{{ $sewa->tgl_sewa }}</td>
                                <td class="px-3 py-2 text-center font-semibold text-gray-800">{{ $sewa->total_harga }}</td>
                            </tr>
                        @endforeach
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        
        <div class="mt-4">
                    <a href="{{ route('laporan.pdf', request()->query()) }}" class="btn btn-danger bg-red-500 text-white py-2 px-5 rounded-md">Export PDF</a>
        </div>  
        @endif
    </div>
</x-layout>