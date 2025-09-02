<x-layout>
    <div class="max-w-4xl mx-auto py-10 px-5">
        <h1 class="text-4xl font-bold  text-[#555] mb-8">Detail Sewa</h1>

       {{-- card detail --}}
        <div class="bg-white shadow-md rounded-md p-5">
            {{-- info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-[#333]">Informasi Sewa</h2>
                    @foreach ($sewa->detailSewa as $detail)
                    <div class="border-b border-gray-200 py-2">
                        <p><span class="font-medium">Penyewa:</span> {{ $sewa->user?->name }}</p>
                        <p><span class="font-medium">Produk:</span> {{ $detail->produk?->nama_produk }}</p>
                        <p><span class="font-medium">Variasi:</span> {{ $detail->variasi?->warna}}-{{$detail->variasi?->ukuran}}</p>
                        <p><span class="font-medium">Tanggal Sewa:</span> {{ $sewa->tgl_sewa }}</p>
                        <p><span class="font-medium">Tanggal Kembali:</span> {{ $sewa->tgl_kembali }}</p>
                        <p><span class="font-medium">Alamat:</span> {{ $sewa->alamat_pengiriman }}</p>
                        <p><span class="font-medium">Total Harga:</span> {{ $sewa->total_harga }}</p>
                        <p><span class="font-medium">Total Barang:</span> {{ $detail->jumlah }}</p>
                        <p><span class="font-medium">Bukti Pembayaran:</span>
                        <img src="{{ asset('storage/' . $sewa->bukti_pembayaran) }}" alt="" class="w-32 h-32 object-cover"></p>
                        {{-- <p><span class="">Bukti Pengembalian:</span>
                        <img src="{{asset('storage/' . $detail->pengembalian->bukti_pengembalian)}}" alt=""></p> --}}
                        <p><span class="font-medium">Status:</span> {{ $sewa->status_sewa }}</p>
                        <p><span class="font-medium">Catatan Penolakan:</span> {{ $sewa->catatan_penolakan }}</p>
                    </div>
                    @endforeach
                    <a href="{{route('sewa.index')}}" class=" px-4 py-2 bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>