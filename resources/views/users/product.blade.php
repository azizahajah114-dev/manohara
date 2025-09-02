@vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="bg-gray-100 font-sans">

<x-header-user></x-header-user>

<!-- Kategori -->
<section class="max-w-7xl mx-auto mt-6 px-4 text-center">
  <h2 class="text-2xl font-semibold mb-4">Kategori</h2>
  <div class="flex justify-center space-x-3">
    {{-- best seller --}}
    <a href="{{ route('users.product', ['best_seller' => 1]) }}" 
      class="px-4 py-2 rounded-lg {{ $bestSeller ? 'text-teal-600' : 'text-gray-700 hover:text-teal-600' }}">
      Best Seller
    </a>
    {{-- <a href="{{ route('users.product') }}" 
      class="px-4 py-2 rounded-lg {{ $kategoriId ? 'text-gray-700 hover:text-teal-600' : 'bg-teal-600 text-white' }}">
      Semua
    </a> --}}
    @foreach($kategori as $kat)
      <a href="{{ route('users.product', ['kategori' => $kat->id]) }}"
        class="px-4 py-2 rounded-lg {{ ($kategoriId == $kat->id) ? 'text-teal-600' : 'text-gray-700 hover:text-teal-600' }}">
          {{ $kat->nama_kategori }}
      </a>
    @endforeach
  </div>
</section>

{{-- <!-- Kategori -->
<section class="max-w-7xl mx-auto mt-6 px-4 text-center">
  <h2 class="text-2xl font-semibold mb-4">Kategori</h2>
  <div class="flex justify-center space-x-3">
    <a href="best-seller.html" class="px-4 py-2 text-teal-700 hover:text-teal-600">
      Best Seller
    </a>
    <a href="./detail.php" class="px-4 py-2 text-gray-700 hover:text-teal-600">
      Tenda
    </a>
    <a href="sleeping-bag.html" class="px-4 py-2 text-gray-700 hover:text-teal-600">
      Sleeping Bag
    </a>
    <a href="peralatan-masak.html" class="px-4 py-2 text-gray-700 hover:text-teal-600">
      Peralatan Masak
    </a>
    <a href="penerangan.html" class="px-4 py-2 text-gray-700 hover:text-teal-600">
      Penerangan
    </a>
  </div>
</section> --}}

<!-- Produk -->
<section class="max-w-7xl mx-auto mt-10 px-4">
  <h2 class="text-2xl font-semibold mb-4">Daftar Produk</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($produk as $p)
      <div class="bg-white rounded-2xl shadow-md p-4 relative">
        @if($p->best_seller)
          <span class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-xl">Best Seller</span>
        @endif

        <img src="{{ asset('storage/'.$p->foto) }}" alt="{{ $p->nama_produk }}" class="w-full h-60 object-cover rounded-lg">
        <h3 class="mt-3 text-lg font-semibold">{{ $p->nama_produk }}</h3>
        <p class="text-gray-600 text-sm">{{ $p->deskripsi }}</p>
        <p class="mt-2 text-teal-700 font-bold">Rp {{ number_format($p->harga, 0, ',', '.') }} / hari</p>
        <a href="{{route('users.detail', $p->id)}}" 
          class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">
          Detail</a>
      </div>
    @endforeach
  </div>
</section>

  {{-- <!-- Produk -->
<section class="max-w-7xl mx-auto mt-10 px-4">
  <h2 class="text-2xl font-semibold mb-4">Daftar Produk</h2>

  <!-- Grid Produk Best Seller -->
<div class="flex justify-center mb-8">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
<!-- Produk Best Seller 1 -->
<div class="bg-white rounded-2xl shadow-md p-4 relative">
  <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1">Best Seller</span>
  <img src="./Assets/produk unggulan hydropack.jpeg" alt="Produk 1" class="w-full h-60 object-cover rounded-lg">
  <h3 class="mt-3 text-lg font-semibold">Tenda Dome 4 Orang</h3>
  <p class="text-gray-600 text-sm">Cocok untuk camping keluarga.</p>
  <p class="mt-2 text-teal-700 font-bold">Rp 75.000 / hari</p>
  <a href="/users/detail" class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">Detail</a>
</div>

<!-- Produk Best Seller 2 -->
<div class="bg-white rounded-2xl shadow-md p-4 relative">
  <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1">Best Seller</span>
  <img src="./Assets/produk unggulan jaket.jpeg" alt="Produk 2" class="w-full h-60 object-cover rounded-lg">
  <h3 class="mt-3 text-lg font-semibold">Jaket Gunung Hangat</h3>
  <p class="text-gray-600 text-sm">Tetap hangat di suhu dingin.</p>
  <p class="mt-2 text-teal-700 font-bold">Rp 50.000 / hari</p>
  <a href="detail-jaket-gunung.html" class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">Detail</a>
</div>

<!-- Produk Best Seller 3 -->
<div class="bg-white rounded-2xl shadow-md p-4 relative">
  <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1">Best Seller</span>
  <img src="./Assets/produk unggulan tenda.jpeg" alt="Produk 3" class="w-full h-60 object-cover rounded-lg">
  <h3 class="mt-3 text-lg font-semibold">Tenda Dome Premium</h3>
  <p class="text-gray-600 text-sm">Kuat dan tahan cuaca ekstrem.</p>
  <p class="mt-2 text-teal-700 font-bold">Rp 100.000 / hari</p>
  <a href="detail-tenda-premium.html" class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">Detail</a>
</div>

<!-- Produk Biasa 1 -->
<div class="bg-white rounded-2xl shadow-md p-4">
  <img src="https://via.placeholder.com/200" alt="Produk 4" class="w-full h-40 object-cover rounded-lg">
  <h3 class="mt-3 text-lg font-semibold">Sleeping Bag Hangat</h3>
  <p class="text-gray-600 text-sm">Nyaman dan ringan dibawa.</p>
  <p class="mt-2 text-teal-700 font-bold">Rp 25.000 / hari</p>
  <a href="detail-sleepingbag.html" class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">Detail</a>
</div>

<!-- Produk Biasa 2 -->
<div class="bg-white rounded-2xl shadow-md p-4">
  <img src="https://via.placeholder.com/200" alt="Produk 5" class="w-full h-40 object-cover rounded-lg">
  <h3 class="mt-3 text-lg font-semibold">Kompor Portable</h3>
  <p class="text-gray-600 text-sm">Praktis untuk masak di gunung.</p>
  <p class="mt-2 text-teal-700 font-bold">Rp 20.000 / hari</p>
  <a href="detail-kompor.html" class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">Detail</a>
</div>

<!-- Produk Biasa 3 -->
<div class="bg-white rounded-2xl shadow-md p-4">
  <img src="https://via.placeholder.com/200" alt="Produk 6" class="w-full h-40 object-cover rounded-lg">
  <h3 class="mt-3 text-lg font-semibold">Lampu Camping LED</h3>
  <p class="text-gray-600 text-sm">Terang dan hemat energi.</p>
  <p class="mt-2 text-teal-700 font-bold">Rp 15.000 / hari</p>
  <a href="detail-lampu.html" class="mt-3 block text-center w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-700">Detail</a>
</div>

</section> --}}

<x-footer-user></x-footer-user>

<script>
  const dropdownBtn = document.getElementById("dropdownBtn");
  const dropdownMenu = document.getElementById("dropdownMenu");

  dropdownBtn.addEventListener("click", () => {
    dropdownMenu.classList.toggle("hidden");
  });

  document.addEventListener("click", (e) => {
    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.add("hidden");
    }
  });
</script>
</body>