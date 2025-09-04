<title>Data Produk</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Kelola <span class="text-[#F3C327]">Produk</span></h1>
    <hr>
    <div class="border-solid border-2 border-[#819A91] shadow p-4 mt-8  items-center justify-beetwen">
        
        <div class="flex justify-between items-center px-4 py-3 bg-[#F4F0F1] border-b border-[#819A91]">
            <h2 class="text-sm font-semibold text-[#F3C327]">Daftar Produk</h2>
            <a href="{{route('produk.create')}}" 
               class="bg-[#6D9280] text-white px-6 py-2 rounded-md hover:bg-[#557866] transition">
               + Tambah
            </a>
        </div>
        
        <div class="mt-3">
            <div class="w-full overflow-x-auto rounded-sm shadow-lg">
            <table class="w-full border-collapse text-sm">
                <thead class="bg-[#E3E9D2] border-b">
                    <tr>
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">No</td>
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Produk</td>
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Kategori</td>
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Deskripsi</td>
                        {{-- <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Stok</td> --}}
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Harga</td>
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Foto</td>
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Best Seller</td>
                        {{-- <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Variasi</td> --}}
                        <td class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-left font-semibold text-gray-700">Aksi</td>
                    </tr>

                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach($produk as $row)
                        <tr>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $no++ }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->nama_produk }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->id_kategori }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->deskripsi }}</td>

                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $row->harga }}</td>
                            <td>
                                @if ($row->foto)
                                    <img src="{{ asset('storage/' . $row->foto) }}" 
                                        alt="Foto Produk" 
                                        class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-500">Belum ada foto</span>
                                @endif
                            </td>
                            <td>{{ $row->best_seller ? 'Ya' : 'Tidak' }}</td>
                            {{-- @foreach ($row->variasi as $variasi)
                                <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{$variasi->warna}}</td>
                            @endforeach --}}
                            <td>
                                <a href="{{ route('produk.edit', $row->id) }}" class="text-blue-500"><i class="bi bi-pencil-square"></i> Edit</a> |
                                <form action="{{ route('produk.destroy', $row->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 delete-produk-btn">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                timer: 3000,
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
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    {{-- SweetAlert2 apakah ingin menghapus --}}
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
    
</x-layout>