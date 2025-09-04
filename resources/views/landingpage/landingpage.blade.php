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
      <span class="text-xl font-bold tracking-wide">ManoharaGiri</span>
    </div>

    <!-- Login -->
    <div class="relative">
      <a href="{{route ('login')}}" 
         class="flex items-center gap-2 text-base hover:underline">
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
                    is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
                    </p>
                    <a href="{{route('users.product')}}" class="btn inline-block mt-4 px-5 py-2 bg-yellow-500 text-white rounded hover:bg-[#6d877d]">
                    Lihat Produk
                    </a>
                </div>
                </section>
                <section id="best-seller" class="py-12 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-[#819A91] mb-8">WHY CHOOSE US?</h2>
        <p class="mb-10">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero, debitis quis. 
            Accusamus et natus nostrum quasi eligendi, cupiditate architecto? 
            Consequatur asperiores aspernatur assumenda est incidunt tempora molestiae, vitae nobis ipsum!
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($allProduk as $all)
            <div class="bg-white rounded-xl shadow-md p-6">
                <img src="{{ asset('storage/'.$all->foto) }}" class="rounded-lg mb-4 w-full h-56 object-cover" alt="{{$all->nama_produk}}">
                <h3 class="font-semibold text-lg text-[#819A91]">{{$all->nama_produk}}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ $all->deskripsi }}</p>
                <a href="{{ route('users.detail', $all->id) }}" class="inline-block mt-4 px-6 py-2 bg-white text-[#819A91] font-semibold rounded-full shadow hover:bg-gray-100">Visit</a>
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
                            alt="{{$all->nama_produk}}" 
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
                        

                        {{-- <!-- Produk 2 -->
                        <div class="relative bg-gray-100 rounded-xl overflow-hidden shadow-md">
                        <span class="absolute top-3 left-3 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            Best Seller
                        </span>
                        <img src="../Assets/image/produk unggulan jaket.jpeg" alt="Carrier Bag"
                            class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800">Carrier Bag 60L</h3>
                            <p class="text-sm text-gray-600">Tas gunung besar untuk perjalanan jauh.</p>
                            <p class="mt-2 text-[#819A91] font-bold">Rp 180.000</p>
                        </div>
                        </div>

                        <!-- Produk 3 -->
                        <div class="relative bg-gray-100 rounded-xl overflow-hidden shadow-md">
                        <span class="absolute top-3 left-3 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            Best Seller
                        </span>
                        <img src="../Assets/image/produk unggulan hydropack.jpeg" alt="Sleeping Bag"
                            class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800">Sleeping Bag</h3>
                            <p class="text-sm text-gray-600">Ringan, hangat, dan nyaman dipakai.</p>
                            <p class="mt-2 text-[#819A91] font-bold">Rp 120.000</p>
                        </div>
                        </div> --}}

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
                    class="px-6 py-3 bg-yellow-500 text-[#333] font-semibold rounded-full shadow hover:bg-yellow-600 transition">
                    Register
                </a>
                </div>
                    </div>
                </section>

                        <!-- Section Syarat & Ketentuan -->
                    <section id="terms" class="px-6 py-10">
                    <h2 class="text-center text-3xl font-bold mb-8 text-[#819A91]">Syarat & Ketentuan</h2>

                    <!-- Card 1 -->
                    <div class="bg-white shadow-lg rounded-xl p-6 mb-6">
                        <h3 class="text-xl font-semibold mb-4 text-[#819A91]">Hal Yang Perlu Diketahui</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>Harga tersebut terhitung mulai 2 hari sewa. (contoh: diambil Jum'at kembali Minggu → 2 hari sewa)</li>
                        <li>Tidak harus per 24 jam, bebas ambil & kembalikan di jam operasional (08.00-21.00).</li>
                        <li>Tidak melayani pengambilan dan pengembalian di luar jam operasional.</li>
                        <li>Terlambat mengembalikkan dianggap menambah hari sewa.</li>
                        <li>Alat yang sudah dibawa tetapi tidak terpakai tetap terhitung sewa.</li>
                        <li>Walaupun tidak dikembalikan sebelum jadwal kembali, uang tidak dapat di refund.</li>
                        </ul>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white shadow-lg rounded-xl p-6">
                        <h3 class="text-xl font-semibold mb-4 text-[#819A91]">Apa Saja Yang Dibutuhkan</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>Jaminan berupa KTP dan KK asli (bukan fotocopy).</li>
                        <li>Tidak menerima kartu pelajar / mahasiswa saja. Jika belum punya KTP, bisa pakai identitas orangtua + kartu pelajar.</li>
                        <li>Pengembalian harus dilakukan oleh orang yang sama dengan identitas saat pengambilan.</li>
                        </ul>
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
    
</body>
</html>