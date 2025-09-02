@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>Edit Produk</title>
<x-layout>
  <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Produk</h1>
    <form action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
      @csrf @method('PUT')

      <label class="block mb-2">Nama Produk</label>
      <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="w-full p-2 border rounded mb-3">

      <label class="block mb-2">Kategori</label>
      <select name="id_kategori" class="w-full p-2 border rounded mb-3">
        @foreach($kategori as $row)
          <option value="{{ $row->id }}" {{ $produk->id_kategori==$row->id?'selected':'' }}>
            {{ $row->nama_kategori }}
          </option>
        @endforeach
      </select>

      <label class="block mb-2">Deskripsi</label>
      <textarea name="deskripsi" class="w-full p-2 border rounded mb-3">{{ $produk->deskripsi }}</textarea>

      {{-- <label class="block mb-2">Stok</label>
      <input type="number" name="stok" value="{{ $produk->stok }}" class="w-full p-2 border rounded mb-3"> --}}

      <label class="block mb-2">Harga</label>
      <input type="number" name="harga" value="{{ $produk->harga }}" class="w-full p-2 border rounded mb-3">

      <label class="block mb-2">Foto Produk (opsional)</label>
      <input type="file" name="foto" accept="image/*" class="w-full p-2 border rounded mb-3">
      @if($produk->foto)
        <img src="{{ asset('storage/'.$produk->foto) }}" alt="Foto Produk" width="120" class="mb-3">
      @endif

      <label class="block mb-2">Best Seller</label>
      <select name="best_seller" class="w-full p-2 border rounded mb-3">
        <option value="0" {{ $produk->best_seller==0?'selected':'' }}>Tidak</option>
        <option value="1" {{ $produk->best_seller==1?'selected':'' }}>Ya</option>
      </select>

      <div class="flex justify-end gap-4">
         <a href="{{route('produk.index')}}" 
          class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
          Batal</a>
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">Update</button>
      </div>

    </form>
  </div>
</x-layout>