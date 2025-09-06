@vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="bg-gray-100 font-sans"> <!-- base font normal -->
<x-header-user></x-header-user>

<!-- Kategori -->
<section class="max-w-6xl mx-auto mt-4 px-2 text-center text-xs"> <!-- kecilin di sini -->
  <h2 class="text-lg font-semibold mb-2 text-[#819A91]">Kategori</h2>
  <div class="flex justify-center space-x-2">
    {{-- best seller --}}
    <a href="{{ route('users.product', ['best_seller' => 1]) }}" 
      class="px-2 py-1 rounded {{ $bestSeller ? 'text-[#F3C327]' : 'text-gray-700 hover:text-[#F3C327]' }} text-sm">
      Best Seller
    </a>
    @foreach($kategori as $kat)
      <a href="{{ route('users.product', ['kategori' => $kat->id]) }}"
        class="px-2 py-1 rounded {{ ($kategoriId == $kat->id) ? 'text-[#F3C327]' : 'text-gray-700  hover:text-[#F3C327]' }} text-sm">
          {{ $kat->nama_kategori }}
      </a>
    @endforeach
  </div>
</section>

<!-- Produk -->
<section class="max-w-6xl mx-auto mt-6 px-2 text-xs">
  <h2 class="text-lg font-semibold mb-3">Daftar Produk</h2>

  <!-- grid 5 produk per baris di desktop -->
  <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
    @foreach($produk as $p)
      <div class="bg-white rounded-xl shadow p-2 relative">
        @if($p->best_seller)
          <span class="absolute top-1 left-1 bg-yellow-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded">
            Best Seller
          </span>
        @endif

        <!-- foto sedikit lebih besar -->
        <img src="{{ asset('storage/'.$p->foto) }}" alt="{{ $p->nama_produk }}" 
             class="block mx-auto w-40 h-40 object-cover rounded-md">

        <h3 class="mt-2 text-sm font-semibold">{{ $p->nama_produk }}</h3>
        <p class="mt-1 text-[#819A91] font-bold text-sm">
          Rp {{ number_format($p->harga, 0, ',', '.') }} / hari
        </p>
        <a href="{{route('users.detail', $p->id)}}" 
          class="mt-2 block text-center w-full bg-[#819A91] text-white py-1.5 rounded-md hover:bg-[#68867B] text-sm">
          Detail
        </a>
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
<<<<<<< HEAD
</body>
=======


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
>>>>>>> 80bded21373acc80a5c6003020388f4b6a1fdb82
