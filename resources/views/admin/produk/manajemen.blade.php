<title>Manajemen Produk</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Manajemen <span class="text-[#F3C327]">Produk</span></h1>
    <hr>
    <div class="border-solid border-2 border-[#819A91] shadow-md rounded-md p-4 mt-8 items-center justify-between">

        <div class="flex justify-between items-center px-4 py-3 bg-[#F4F0F1]">
            <h2 class="text-sm font-semibold text-[#F3C327]">Daftar Variasi Produk</h2>
        </div>

        <div class="mt-3">
            <div class="w-full overflow-x-auto rounded-sm shadow-lg">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-[#E3E9D2] border-b">
                        <tr>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Nama Produk</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Variasi</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Stok Saat Ini</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item)
                            @foreach ($item->variasi as $variasi)
                                <tr>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $item->nama_produk }}</td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $variasi->warna }} - {{ $variasi->ukuran }}</td>
                                    <td class="border border-[#F6EFEF] px-3 py-2 text-center font-bold text-gray-900">{{ $variasi->stok }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>