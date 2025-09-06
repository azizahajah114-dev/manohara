<x-layout>
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg mx-auto mt-10">
        <h1 class="text-xl">Edit Variasi</h1>
        <form action="{{route('variasi.update', $variasi)}}" method="post">
            @csrf @method('PUT')
            <div>
                <label for="id_produk" class="block font-medium text-gray-700">Pilih Produk</label>
                <select name="id_produk" id="id_produk"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @foreach ($produk as $p)
                        <option value="{{ $p->id }}" {{ $variasi->id_produk == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="warna" class="block font-medium text-gray-700">Warna</label>
                <input type="text" name="warna" id="warna" value="{{$variasi->warna}}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="ukuran" class="block font-medium text-gray-700">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran" value="{{$variasi->ukuran}}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div>
                <label for="stok" class="block font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" id="stok" min="0" value="{{$variasi->stok}}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>
            
            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('variasi.index') }}"
                   class="bg-[#819A91] text-white px-6 py-2 rounded-md hover:bg-[#647a72] transition">
                    Batal
                </a>
                <button type="submit"
                    class="bg-[#174E4E] text-white px-6 py-2 rounded-md hover:bg-[#134242] transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-layout>