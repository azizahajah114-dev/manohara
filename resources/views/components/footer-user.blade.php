@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- Footer -->
<footer class="bg-[#819A91] text-gray-100 text-sm">
  <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col items-center text-center gap-6 mt-6 
              md:flex-row md:items-start md:text-left md:justify-center md:flex-wrap md:gap-8">



              
    <!-- Logo & Deskripsi -->
    <div class="w-[180px] flex flex-col items-center md:items-start md:mr-4">
      <div class="flex items-center gap-2">
        <img src="{{ asset('asset/logo1.png') }}" 
             alt="Logo" 
             class="w-[40px] h-auto">
        <span class="text-lg font-bold tracking-wide">Manohara<span class="text-[#F3C327]">Giri</span></span>
      </div>
      <p class="mt-2 text-gray-200 text-sm">Menuju Puncak bersama.</p>
    </div>

    <!-- Menu -->
    <div class="w-[160px]">
      <h3 class="text-lg font-semibold text-white">Menu</h3>
      <ul class="mt-3 space-y-1">
        <li><a href="{{route('dashboard')}}" class="text-[#D1D8BE] hover:text-[#F3C327] hover:pl-2 transition-all duration-300 block">HomePage</a></li>
        <li><a href="{{route('users.product')}}" class="text-[#D1D8BE] hover:text-[#F3C327] hover:pl-2 transition-all duration-300 block">List Of Item</a></li>
        <li><a href="{{route('syarat')}}" class="text-[#D1D8BE] hover:text-[#F3C327] hover:pl-2 transition-all duration-300 block">Terms & Conditions</a></li>
        <li><a href="{{route('contact')}}" class="text-[#D1D8BE] hover:text-[#F3C327] hover:pl-2 transition-all duration-300 block">Contact Us</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div class="w-[180px]">
      <h3 class="text-lg font-semibold text-white">Contact Us</h3>
      <ul class="mt-3 space-y-1 text-gray-200">
        <li>Email: ManoharaGiri@gmail.com</li>
        <li>Telp: +62 896-5240-6295</li>
        <li>Alamat: JawaBarat, Indonesia</li>
      </ul>
    </div>

    <!-- Media Sosial -->
    <div class="flex space-x-3 mt-3">
      <!-- Lokasi -->
      <a href="https://maps.google.com/?q=Jakarta" target="_blank" 
         class="w-8 h-8 flex items-center justify-center rounded-full bg-white text-[#819A91] hover:bg-[#E7CE7C] transition text-lg">
        <i class="fa-solid fa-map-marker-alt"></i>
      </a>

      <!-- WhatsApp -->
      <a href="https://wa.me/6281234567890" target="_blank" 
         class="w-8 h-8 flex items-center justify-center rounded-full bg-white text-[#819A91] hover:bg-[#E7CE7C]  transition text-lg">
        <i class="fa-brands fa-whatsapp"></i>
      </a>

      <!-- Instagram -->
      <a href="https://instagram.com/username" target="_blank" 
         class="w-8 h-8 flex items-center justify-center rounded-full bg-white text-[#819A91] hover:bg-[#E7CE7C]  transition text-lg">
        <i class="fa-brands fa-instagram"></i>
      </a>
    </div>
  </div>

  <!-- Copyright -->
  <div class="border-t border-[#A7C1A8] mt-4 w-full">
    <p class="text-center text-xs text-[#D1D8BE] py-3">
      &copy; 2025 ManoharaGiri. All rights reserved.
    </p>
  </div>
</footer>
