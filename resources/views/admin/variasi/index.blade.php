<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Daftar <span class="text-[#F3C327]">Variasi</span></h1>
    <hr>

    <div class="bg-white rounded-lg shadow p-4 border mt-8 items-center justify-beetwen">
        <div class="flex justify-end">
            <a href="{{route('variasi.create')}}" 
            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
            Tambah Variasi</a>
        </div>
        <h2 class="text-sm font-semibold text-gray-600 mb-4 ">Daftar Variasi</h2>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead class="bg-[#E3E9D2] border-b">
                    <tr>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">No</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Nama Produk</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Warna</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Ukuran</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Stok</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Aksiii</td>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @php $no = 1; @endphp
                @forelse($variasi as $row)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $no++ }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->produk->nama_produk }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->warna}}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->ukuran }}</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-800">{{ $row->stok }}</td>

                        <td class="px-3 py-2 text-leftfont-semibold text-gray-800">
                            <a href="{{ route('variasi.edit', $row->id) }}" class="text-blue-500"><i class="bi bi-pencil-square"></i> Edit</a> |
                            <form action="{{ route('variasi.destroy', $row->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 " onclick="return confirm('Yakin hapus variasi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>


                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Tidak ada variasi ditemukan.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>