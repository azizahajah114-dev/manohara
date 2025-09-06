@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Header -->
<header class="bg-[#819A91] text-white">
  <div class="navbar flex justify-between items-center px-4 py-3">
    <!-- Logo -->
    <div class="content-image flex items-center">
      <img src="{{ asset('asset/logo1.png') }}" 
           class="w-[50px] h-auto mr-2 align-middle">
       <span class="text-lg font-bold tracking-wide">Manohara<span class="text-[#F3C327]">Giri</span></span>
      </span>
    </div>

    <!-- Menu Tengah -->
<div class="nav-links flex gap-6">
  <a href="{{route('dashboard')}}">
    <span class="text-[15px] ml-4 
      {{ request()->is('users/dashboard') ? 'text-[#F3C327]' : 'text-white' }} 
      hover:text-[#F3C327]">
      Dashboard
    </span>
  </a>
  <a href="{{route('users.product')}}">
    <span class="text-[15px] ml-4 
      {{ request()->routeIs('users.product') ? 'text-[#F3C327]' : 'text-white' }} 
      hover:text-[#F3C327]">
      List Of Item
    </span>
  </a>
  <a href="{{route('syarat')}}">
    <span class="text-[15px] ml-4 
      {{ request()->routeIs('syarat') ? 'text-[#F3C327]' : 'text-white' }} 
      hover:text-[#F3C327]">
      Terms & Conditions
    </span>
  </a>
  <a href="{{route('contact')}}">
    <span class="text-[15px] ml-4 
      {{ request()->routeIs('contact') ? 'text-[#F3C327]' : 'text-white' }} 
      hover:text-[#F3C327]">
      Contact Us
    </span>
  </a>
</div>

    <!-- Dropdown -->
    <div class="relative">
      <!-- Tombol Dropdown -->
      <button id="dropdownBtn" 
        class="flex items-center gap-2 px-4 py-2 rounded-md  text-white  transition">
        <span>{{ Auth::user()->name }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-4 w-4 transform transition-transform duration-200" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M19 9l-7 7-7-7" />
        </svg>
      </button>

<!-- Menu Dropdown -->
<div id="dropdownMenu" 
     class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden">
  <a href="{{ route('profile.update') }}" 
     class="block px-4 py-2 text-[#535252] rounded hover:bg-[#9EB8A4] hover:text-white transition">
    Profile Settings
  </a>
  <a href="{{ route('users.riwayat.index') }}" 
     class="block px-4 py-2 text-[#535252] rounded hover:bg-[#9EB8A4] hover:text-white transition">
    Rental Story
  </a>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" 
      class="block w-full px-4 py-2 text-left text-[#535252] rounded hover:bg-[#9EB8A4] hover:text-white transition">
      Logout
    </button>
  </form>
</div>

    </div>
  </div>
</header>

<!-- Script Dropdown -->
<script>
  const dropdownBtn = document.getElementById("dropdownBtn");
  const dropdownMenu = document.getElementById("dropdownMenu");

  dropdownBtn.addEventListener("click", () => {
    dropdownMenu.classList.toggle("hidden");
  });

  // Klik di luar dropdown → tutup menu
  document.addEventListener("click", (e) => {
    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.add("hidden");
    }
  });
</script>
