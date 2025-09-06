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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "{{ session('error') }}",
            confirmButtonColor: '#6D9280'
        })
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            confirmButtonColor: '#6D9280'
        })
    </script>
@endif


</body>