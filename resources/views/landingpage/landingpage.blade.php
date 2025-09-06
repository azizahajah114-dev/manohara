<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body  class="font-inter bg-[#D1D8BE]">
    
        <div class="wrap">

            <content>
                <!-- Header -->
<header class="bg-[#819A91] text-white">
  <div class="navbar flex justify-between items-center px-4 py-3">
    <div class="content-image flex items-center">
      <img src={{ asset('asset/logo1.png') }}
           class="w-[50px] h-auto mr-2 align-middle">
      <span class="text-lg font-bold tracking-wide">Manohara<span class="text-[#F3C327]">Giri</span></span>
    </div>

    <!-- Login -->
    <div class="relative">
      <a href="{{route ('login')}}" 
         class="flex items-center gap-2 font-bold hover:underline">
        Login
      </a>
    </div>
</header>


                <section id="home" class="hero flex justify-center items-center gap-7 md:gap-16 lg:gap-20 px-6 py-12 h-screen bg-center">
              
                <div class="">
                    <img src="{{ asset('asset/bg-gunung.jpeg') }}" alt="Gunung" class="absolute inset-0 w-full md:gap-16 lg-gap-20 bg-cover object-cover object-center z-[-1]">
                </div>
                <div class="hero-text max-w-2xl text-white text-center">
                    <!-- Bagian Judul Hero -->
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                MANOHARA GIRI <span class="text-yellow-500"><br>JUST FOR YOU</span>
                </h1>
                    <p class="mt-4">
                    Mulai dari tenda, carrier, hingga perlengkapan camping — semua bisa kamu dapatkan dengan mudah di Manohara Giri. Nikmati perjalanan mendaki tanpa ribet, cukup booking alat lewat aplikasi, alat siap dipakai!
                    </p>
                    <a href="{{route('users.product')}}" class="btn inline-block mt-4 px-5 py-2 bg-yellow-500 text-white font-bold rounded hover:bg-yellow-550">
                    Lihat Produk
                    </a>
                </div>
                </section>
                <section id="best-seller" class="py-12 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-[#819A91] mb-8">WHY CHOOSE US?</h2>
        <p class="mb-10">
            Di Manohara Giri, setiap pendaki berhak mendapatkan perlengkapan terbaik. Kami hadir dengan alat pendakian berkualitas, terawat, dan harga bersahabat untuk menemani setiap langkahmu menuju puncak.
        </p>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
    @foreach ($allProduk as $all)
    <div class="bg-white rounded-xl shadow-md p-6 ">
        <img src="{{ asset('storage/'.$all->foto) }}" 
             class="rounded-md mb-3 w-70 h-40 object-contain mx-auto bg-gray-100" 
             alt="{{$all->nama_produk}}">
        <h3 class="font-semibold text-sm text-[#819A91] text-center">{{$all->nama_produk}}</h3>
        <p class="text-xs text-gray-600 mt-1 text-center">{{ $all->deskripsi }}</p>
        <a href="{{ route('users.detail', $all->id) }}" 
           class="inline-block mt-3 px-4 py-1 bg-white text-[#819A91] text-xs font-medium rounded-full shadow hover:bg-gray-100">
           Visit
        </a>
    </div>
    @endforeach
</div>

    </div>
</section>


                <!-- About Us Section -->
                <section id="tentang" class="py-20 px-6 md:px-12 bg-[#9EB8A4]">
                    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
                    
                    <!-- Teks -->
                    <div class="flex-1 text-white">
                        <h1 class="text-4xl font-bold mb-4">About Us</h1>
                        <p class="mb-4 leading-relaxed">
                        <strong>ManoharaGiri</strong> merupakan jasa persewaan alat outdoor dan camping di Bogor.
                        Lokasi kami berada di Jl. Barokah No.06, Wanaherang, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16965.
                        </p>
                        <p class="mb-4 leading-relaxed">
                        Kami buka setiap hari Senin–Jum'at pukul 09.00–22.00. Namun khusus hari Jum'at, kami tutup sementara pada pukul 11.00–13.00 untuk sholat Jum'at. Pada tanggal merah kami tetap buka.
                        </p>
                        <p class="leading-relaxed">
                        Jangan ragu untuk datang ke toko kami atau menghubungi kami. Dengan senang hati, kami siap melayani kebutuhan outdoor Anda.
                        </p>
                    </div>

                    <!-- Foto -->
                    <div class="flex-1">
                       
                        <img src="{{asset('asset/rental.jpg')}}" 
                            alt="{about us}}" 
                            class="w-full max-w-md rounded-[30px] border-4 border-[#819A91] shadow-lg mx-auto">
                       
                    </div>
                    </div>
                </section>

                <!-- Best Seller Section -->
                <section id="best-seller" class="py-20 px-6 md:px-12 bg-white">
                    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                    <!-- Text Section -->
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-[#819A91] mb-6">
                        Our <span class="text-yellow-500">Best Seller</span>
                        </h2>
                        <p class="text-gray-700 text-lg leading-relaxed mb-4">
                        Produk-produk pilihan terbaik kami yang paling banyak diminati pelanggan.
                        Dirancang untuk menemani perjalanan outdoor Anda dengan kualitas premium
                        dan harga terjangkau.
                        </p>
                        <p class="text-gray-600">
                        Mulai dari tenda hiking, tas carrier, hingga sleeping bag — semuanya
                        sudah terbukti nyaman, awet, dan praktis untuk kegiatan alam bebas.
                        </p>
                    </div>

                    <!-- Products Section -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @forelse ($produk as $p)
                          <!-- Produk 1 -->
                          <div class="relative bg-gray-100 rounded-xl overflow-hidden shadow-md">
                          <span class="absolute top-3 left-3 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                              Best Seller
                          </span>
                          
                          <img src="{{asset('storage/'.$p->foto)}}" alt="{{$p->nama_produk}}"
                              class="w-full h-56 object-cover">
                          <div class="p-4">
                              <h3 class="font-semibold text-gray-800">{{$p->nama_produk}}</h3>
                              <p class="text-sm text-gray-600">{{ $p->deskripsi }}</p>
                              <p class="mt-2 text-[#819A91] font-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                          </div>
                          </div>
                        @empty
                          
                        @endforelse
                    </div>
                    </div>
                </section>



                    <!-- CTA Section -->
                <section class="relative bg-[#9EB8A4] text-white py-20 px-6">
                    <div class="container mx-auto text-center max-w-2xl">
                    
                    <!-- Judul -->
                
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Bergabung dengan <span class="text-yellow-500">ManoharaGiri</span>
                    </h1>
                    </h1>
                    <p class="text-lg mb-8 leading-relaxed">
                        Nikmati kemudahan rental alat outdoor dengan layanan terbaik dan harga terjangkau.  
                        Daftar sekarang atau login untuk mulai menggunakan layanan kami.
                    </p>

                <!-- Tombol CTA -->
                <div class="flex justify-center gap-6">
                <a href="{{route ('login')}}" 
                    class="px-6 py-3 bg-white text-[#819A91] font-semibold rounded-full shadow hover:bg-gray-100 transition">
                    Login
                </a>
                <a href="{{route ('register')}}" 
                    class="px-6 py-3 bg-yellow-500 text-white font-semibold rounded-full shadow hover:bg-yellow-600 transition">
                    Register
                </a>
                </div>
                    </div>
                </section>

                    <!-- Section Syarat & Ketentuan -->
<section id="terms" class="px-6 py-10">
  <h2 class="text-center text-3xl font-bold mb-8">
    <span class="text-[#819A91]">Syarat</span> 
    <span class="text-yellow-500">&amp; Ketentuan</span>
  </h2>

  <!-- Card -->
  <div class="bg-white shadow-lg rounded-xl p-6 text-center">
      <h3 class="text-xl font-semibold mb-4 text-[#819A91]">Apa Saja Yang Dibutuhkan</h3>
      <ul class="space-y-2 text-gray-700">
          <li>Setelah berhasil login, pengguna wajib memasukkan nomor KTP untuk verifikasi data.
            Data KTP akan divalidasi dengan identitas saat pengambilan alat.</li>
          <li>Tidak menerima kartu pelajar / mahasiswa saja. Jika belum punya KTP, bisa pakai identitas orangtua + kartu pelajar.</li>
          <li>Pengembalian harus dilakukan oleh orang yang sama dengan identitas saat pengambilan.</li>
      </ul>
      <div class="mt-6 flex justify-center">
        <a href="{{route('syarat')}}" 
          class="btn px-6 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600">
          Selengkapnya
        </a>
      </div>
  </div>
</section>
            <!-- Section Ulasan -->
<section id="ulasan" class="px-6 py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto text-center">

    <!-- Judul -->
    <h2 class="text-3xl font-bold text-gray-700 mb-2">
      Apa Kata <span class="text-yellow-500">Mereka?</span>
    </h2>
    <div class="w-24 h-1 bg-yellow-400 mx-auto mb-10"></div>

    <!-- Grid Ulasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- Card Ulasan 1 -->
      <div class="bg-white rounded-xl border border-gray-200 p-6 shadow hover:shadow-md transition">
        <h3 class="font-semibold text-gray-800 mb-2">
          Produk Yang Bagus Dan Proses Cepat
        </h3>
        <p class="text-sm text-gray-600 mb-4">
          Produknya aku suka banget, terus produk cepat banget sampainya.
        </p>
        <div class="flex items-center justify-between mt-8">
  <!-- Nama pelanggan -->
  <p class="font-semibold text-gray-800">Asep Saepul</p>
  
  <!-- Rating -->
  <div class="flex text-yellow-400">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="far fa-star text-gray-400"></i>
  </div>
</div>
</div>

<!-- Card Ulasan 2 -->
      <div class="bg-white rounded-xl border border-gray-200 p-6 shadow hover:shadow-md transition">
        <h3 class="font-semibold text-gray-800 mb-2">
          Penyewaan Yang Praktis Dan Tidak Ribet
        </h3>
        <p class="text-sm text-gray-600 mb-4">
          Bagus banget barangnya aku suka, sewa-nya juga ga ribet, praktis dan gampang banget.
        </p>
       <div class="flex items-center justify-between mt-8">
  <!-- Nama pelanggan -->
  <p class="font-semibold text-gray-800">Budi Santoso</p>
  
  <!-- Rating -->
  <div class="flex text-yellow-400">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="far fa-star text-gray-400"></i>
  </div>
</div>

      </div>

      <!-- Card Ulasan 3 -->
      <div class="bg-white rounded-xl border border-gray-200 p-6 shadow hover:shadow-md transition">
        <h3 class="font-semibold text-gray-800 mb-2">
          Pelanggan Tetap
        </h3>
        <p class="text-sm text-gray-600 mb-4">
          The best banget kalo sewa barang di sini, jadi pelanggan rental cuy!
        </p>
      <div class="flex items-center justify-between mt-8">
  <!-- Nama pelanggan -->
  <p class="font-semibold text-gray-800">Bella Putri</p>
  
  <!-- Rating -->
  <div class="flex text-yellow-400">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="far fa-star text-gray-400"></i>
  </div>
</div>

      </div>

      
    </div>
  </div>
</section>


                    
            </content>
         
            <x-footer-user></x-footer-user>
        </div>
    

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
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
        confirmButtonColor: '#819A91'
    })
</script>
@endif

</body>
</html>