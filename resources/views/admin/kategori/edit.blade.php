<x-layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-center text-gray-800">Edit Kategori</h2>
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label  class="block-md">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" 
            class="w-full p-2 border rounded mb-3" required>

            <div class="flex justify-end mt-4 gap-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            
                <a href="{{ route('kategori.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Kembali</a>
            </div>
            
        
        </form>
    </div>

        
    </div>
</x-layout>