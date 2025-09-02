<x-layout>
    <div class="bg-white rounded-lg shadow p-4 border mt-[50px] w-[140vh] items-center justify-beetwen">
        <div class="flex justify-end">
            <a href="{{route('kategori.create')}}" 
            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
            Tambah Kategori</a>
        </div>
        <h2 class="text-sm font-semibold text-gray-600 mb-4 ">Daftar Kategori</h2>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead class="bg-[#E3E9D2] border-b">
                    <tr>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">No</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Nama kategori</td>
                        <td class="px-3 py-2 text-left font-semibold text-gray-700">Aksi</td>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @php $no = 1; 
                    @endphp
                @forelse($kategori as $row)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 font-semibold text-gray-800">{{ $no++ }}</td>
                        <td class="px-3 py-2 font-semibold text-gray-800">{{ $row->nama_kategori }}</td>
                        <td class="px-3 py-2 font-semibold text-gray-800">
                            <a href="{{ route('kategori.edit', $row->id) }}" class="text-blue-500"><i class="bi bi-pencil-square"></i> Edit</a> |
                            <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 " onclick="return confirm('Yakin hapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                

                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Tidak ada kategori ditemukan.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</x-layout>