<x-layout>
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Tambah Produk</h2>

        {{-- Arahkan ke route produk.store --}}
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#A7C1A8] focus:outline-none">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Kategori</label>
                <select name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                    @endforeach
                </select>

            </div>

            <div>
                <label class="block font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#A7C1A8] focus:outline-none">{{ old('deskripsi') }}</textarea>
            </div>

            {{-- <div>
                <label class="block font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" value="{{ old('stok') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#A7C1A8] focus:outline-none">
            </div> --}}

            <div>
                <label class="block font-medium text-gray-700">Harga Sewa</label>
                <input type="number" name="harga" value="{{ old('harga') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#A7C1A8] focus:outline-none">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Foto Produk</label>
                {{-- perbaiki name jadi array sesuai controller --}}
                <input type="file" name="foto"  accept="image/*" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-[#A7C1A8] focus:outline-none">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Best Seller</label>
                <select name="best_seller"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#A7C1A8] focus:outline-none">
                    <option value="">-- Pilih --</option>
                    <option value="0" {{ old('best_seller') == 0 ? 'selected' : '' }}>Tidak</option>
                    <option value="1" {{ old('best_seller') == 1 ? 'selected' : '' }}>Ya</option>
                </select>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('produk.index') }}"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layout>
