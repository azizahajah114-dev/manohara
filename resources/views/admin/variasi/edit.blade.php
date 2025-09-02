<x-layout>
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg mx-auto mt-10">
        <h1 class="text-xl">Edit Variasi</h1>
        <form action="{{route('variasi.update', ['variasi' => $variasi->id])}}" method="post">
            @csrf
            @foreach ($produk as $produk)
            @endforeach
            <div>
                <label for="nama_produk" class="block font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" value="{{$produk->nama_produk}}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>
            <div>
                <label for="warna" class="block font-medium text-gray-700">Warna</label>
                <input type="text" name="warna" id="warna"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="ukuran" class="block font-medium text-gray-700">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran" value="{{$variasi->warna}}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="stok" class="block font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" id="stok" min="0" value="{{$variasi->ukuran}}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>
            
            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('variasi.index') }}"
                   class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">
                    Batal
                </a>
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-layout>