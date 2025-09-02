
@vite(['resources/css/app.css', 'resources/js/app.js'])
  <body class="font-inter bg-[#D1D8BE]">
  
  <x-header-user></x-header-user>

   <main>
    <!-- Hero Section -->
    <section id="home" class="hero flex justify-center items-center gap-7 md:gap-16 lg:gap-20 px-6 py-12 h-[90vh] bg-[#A7C1A8]">
      <div class="hero-text max-w-2xl text-white">
        <h1 class="text-4xl font-bold leading-snug">
  BUTUH BARANG DAN ALAT UNTUK <br>
  KEGIATAN OUTDOOR DAN CAMPING? <br>
  <span class="text-yellow-400">MANOHARAGIRI</span> STORE SOLUSINYA.
</h1>

        <p class="mt-4">Ikuti kami di media sosial atau hubungi kami langsung.</p>
      <a href="{{route('users.product')}}" class="btn inline-block mt-4 px-5 py-2 bg-yellow-400 text-white font-semibold rounded hover:bg-yellow-500 transition">
  Lihat Produk
</a>

      </div>
      <div class="hero-image">
        <img src="{{ asset('asset/nunung.png') }}" alt="Hero Image">
      </div>
    </section>

    <!-- Tentang -->
<section id="tentang" class="py-20 px-10 bg-[#9EB8A4] flex flex-wrap items-center gap-10">
  <!-- Gambar -->
  <div class="flex-1">
    <img src="{{ asset('asset/rental.jpg') }}" 
         alt="Tentang Kami" 
         class="w-[700px] h-[500px] rounded-[30px] border-4 border-[#819A91] object-cover">
  </div>

  <!-- Teks -->
  <div class="flex-1 text-white">
    <h1 class="text-5xl font-bold mb-6">About Us</h1>

    <p class="mb-6 leading-relaxed text-xl">
      <span class="font-semibold text-yellow-400">ManoharaGiri</span> merupakan jasa persewaan alat outdoor dan camping di Bogor.<br>
      Lokasi kami di Jl. Barokah No.06, Wanaherang, Kec. Gn. Putri,<br>
      Kabupaten Bogor, Jawa Barat 16965.
    </p>

    <p class="mb-6 leading-relaxed text-xl">
      Kami buka setiap hari Senin–Jum'at pukul 09.00–22.00.<br>
      Namun setiap hari Jum'at kami tutup pada pukul 11.00–13.00 untuk sholat Jum'at.<br>
      Untuk tanggal merah kami tetap buka.
    </p>

    <p class="leading-relaxed text-xl">
      Jangan lupa untuk datang ke toko kami. Jangan ragu untuk menghubungi<br>
      dan menggunakan jasa kami. Dengan senang hati, service kami akan melayani Anda.
    </p>
  </div>
</section>



    <!-- Menu Bawah -->
    <section class="menu-bawah bg-[#D1D8BE] py-10 px-5">
      <div class="menu-bawah-container flex justify-center gap-5 flex-wrap">
        <a href="/users/product" class="menu-card bg-white rounded-lg p-5 text-center w-[250px] shadow hover:-translate-y-1 hover:shadow-lg transition border border-[#A7C1A8]">
          <h3 class="mb-2 text-[#819A91] font-semibold">List of Item</h3>
          <p class="text-sm text-[#555]">Lihat semua perlengkapan outdoor & camping.</p>
        </a>
        <a href="/users/syarat" class="menu-card bg-white rounded-lg p-5 text-center w-[250px] shadow hover:-translate-y-1 hover:shadow-lg transition border border-[#A7C1A8]">
          <h3 class="mb-2 text-[#819A91] font-semibold">Syarat & Ketentuan</h3>
          <p class="text-sm text-[#555]">Baca aturan sewa & pengembalian barang.</p>
        </a>
        <a href="/users/contact" class="menu-card bg-white rounded-lg p-5 text-center w-[250px] shadow hover:-translate-y-1 hover:shadow-lg transition border border-[#A7C1A8]">
          <h3 class="mb-2 text-[#819A91] font-semibold">Kontak Kami</h3>
          <p class="text-sm text-[#555]">Hubungi kami untuk pertanyaan atau booking.</p>
        </a>
      </div>
    </section>
   </main>

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
