@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- Footer -->
<footer class="bg-[#819A91] text-gray-100">
  <div class="max-w-6xl mx-auto px-4 py-8 flex flex-col items-center text-center gap-8 mt-8 
              md:flex-row md:items-start md:text-left md:justify-center md:flex-wrap md:gap-12">

    <!-- Logo & Deskripsi -->
    <div class="w-[220px] flex flex-col items-center md:items-start md:mr-6">
      <div class="flex items-center gap-2">
        <img src="{{ asset('asset/logo1.png') }}" 
             alt="Logo" 
             class="w-[50px] h-auto">
        <span class="text-2xl font-bold tracking-wide">ManoharaGiri</span>
      </div>
      <p class="mt-3 text-gray-200 text-base">Menuju Puncak bersama.</p>
    </div>

    <!-- Menu -->
    <div class="w-[200px]">
      <h3 class="text-xl font-semibold text-white">Menu</h3>
      <ul class="mt-4 space-y-2 text-base">
        <li><a href="{{route('dashboard')}}" class="text-[#D1D8BE] hover:text-white hover:pl-2 transition-all duration-300 block">HomePage</a></li>
        <li><a href="{{route('users.product')}}" class="text-[#D1D8BE] hover:text-white hover:pl-2 transition-all duration-300 block">List Of Item</a></li>
        <li><a href="{{route('syarat')}}" class="text-[#D1D8BE] hover:text-white hover:pl-2 transition-all duration-300 block">Terms & Conditions</a></li>
        <li><a href="{{route('contact')}}" class="text-[#D1D8BE] hover:text-white hover:pl-2 transition-all duration-300 block">Contact Us</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div class="w-[220px]">
      <h3 class="text-xl font-semibold text-white">Contact Us</h3>
      <ul class="mt-4 space-y-2 text-base text-gray-200">
        <li>Email: ManoharaGiri@gmail.com</li>
        <li>Telp: +62 896-5240-6295</li>
        <li>Alamat: JawaBarat, Indonesia</li>
      </ul>
    </div>

    <!-- Media Sosial -->
    <div class="flex space-x-4  mt-4">
      <!-- Lokasi -->
      <a href="https://maps.google.com/?q=Jakarta" target="_blank" 
         class="w-10 h-10 flex items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 transition text-xl">
        <i class="fa-solid fa-map-marker-alt"></i>
      </a>

      <!-- WhatsApp -->
      <a href="https://wa.me/6281234567890" target="_blank" 
         class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600 transition text-xl">
        <i class="fa-brands fa-whatsapp"></i>
      </a>

      <!-- Instagram -->
      <a href="https://instagram.com/username" target="_blank" 
         class="w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white hover:opacity-80 transition text-xl">
        <i class="fa-brands fa-instagram"></i>
      </a>
    </div>
  </div>

  <!-- Copyright -->
  <div class="border-t border-[#A7C1A8] mt-6 w-full">
    <p class="text-center text-base text-[#D1D8BE] py-4">
      &copy; 2025 ManoharaGiri. All rights reserved.
    </p>
  </div>
</footer>
