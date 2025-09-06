<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Kelola <span class="text-[#F3C327]">Kategori</span>  <span class="text-[#6D9280]">Produk</span></h1>
    <hr>

    <div class="border-2 border-solid border-[#819A91] rounded-md shadow p-4 mt-8 items-center justify-beetwen">
        <div class="flex justify-between items-center px-4 py-3 bg-[#F4F0F1]">
            <h2 class="text-sm font-semibold text-[#F3C327] mb-4 ">Daftar Kategori</h2>
            <a href="{{route('kategori.create')}}" 
            class="bg-[#6D9280] hover:bg-[#557866] text-white px-6 py-2 rounded-lg transition">
            Tambah Kategori</a>
        </div>

        <div class="mt-3">
                        <div class="w-full overflow-x-auto rounded-sm shadow-lg">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-[#E3E9D2] border-b">
                        <tr>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">No</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Nama kategori</td>
                            <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Aksi</td>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @php $no = 1; 
                        @endphp
                    @forelse($kategori as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-[#F6EFEF] px-3 py-2 font-semibold text-gray-800 text-center">{{ $no++ }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 font-semibold text-gray-800 text-center">{{ $row->nama_kategori }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 font-semibold text-gray-800 text-center">
                                <a href="{{ route('kategori.edit', $row->id) }}" class="text-blue-500"><i class="bi bi-pencil-square"></i> Edit</a> |
                                <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 delete-produk-btn">Hapus</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-produk-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: 'Apakah Anda yakin ingin menghapus produk ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonColor: '#3085d6',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>