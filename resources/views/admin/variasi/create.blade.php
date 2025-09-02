<x-layout>
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Tambah Variasi</h2>

        <form action="{{ route('variasi.store') }}" method="POST">
            @csrf
            <div>
                <label for="id_produk" class="block font-medium text-gray-700">Pilih Produk</label>
                <select name="id_produk" id="id_produk" 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="warna" class="block font-medium text-gray-700">Warna</label>
                <input type="text" name="warna" id="warna"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="ukuran" class="block font-medium text-gray-700">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="stok" class="block font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" id="stok" min="0"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('variasi.index') }}"
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
