
<body class="bg-[#D1D8BE] font-inter">

  <x-header-user></x-header-user>

  <!-- Container -->
  <section class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-[#819A91] mb-8 text-center">
      Contact Us
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-8 rounded-2xl shadow-lg border border-[#A7C1A8]">
      
      <!-- Kolom Kiri: Media Sosial & Alamat -->
      <div>
        <h2 class="text-xl font-semibold text-[#819A91] mb-4">
          Media Sosial & Alamat
        </h2>
        <p class="text-gray-600 mb-6">
          Anda dapat menghubungi kami melalui platform berikut:
        </p>
        
        <div class="space-y-4">
          <!-- WhatsApp -->
          <a href="https://wa.me/6281234567890" target="_blank" 
             class="flex items-center space-x-3 p-4 border border-[#A7C1A8] rounded-lg hover:bg-[#D1D8BE] transition">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="w-8 h-8">
            <span class="text-gray-700 font-medium">WhatsApp</span>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/manohara_giri" target="_blank" 
             class="flex items-center space-x-3 p-4 border border-[#A7C1A8] rounded-lg hover:bg-[#D1D8BE] transition">
            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="w-8 h-8">
            <span class="text-gray-700 font-medium">Instagram</span>
          </a>

          <!-- Alamat -->
          <div class="flex items-center space-x-3 p-4 border border-[#A7C1A8] rounded-lg bg-[#F9FAF9]">
            <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" alt="Alamat" class="w-8 h-8">
            <span class="text-gray-700 font-medium">
              Jl. Barokah No.06, Wanaherang, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16965.
            </span>
          </div>
        </div>
      </div>

      <div class="flex justify-center items-center">
        <a href="https://www.google.com/maps/place/Jl.+Barokah+No.06,+Wanaherang,+Kec.+Gn.+Putri,+Kabupaten+Bogor,+Jawa+Barat+16965" 
          target="_blank" 
          class="transition transform hover:scale-105">
          <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" 
              alt="Map Illustration" 
              class="w-48 h-48 opacity-80">
        </a>
      </div>
  </section>

  <x-footer-user></x-footer-user>

</body>
