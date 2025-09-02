@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Header -->
<header class="bg-[#819A91] text-white">
  <div class="navbar flex justify-between items-center px-4 py-3">
    <div class="content-image flex items-center">
      <img src="{{ asset('asset/logo1.png') }}" 
           class="w-[50px] h-auto mr-2 align-middle">
      <span class="text-xl font-bold tracking-wide">Manohara<span class="text-[#F3C327]">Giri</span></span>
    </div>

    <!-- Menu Tengah -->
    <div class="nav-links flex gap-6">
      <a href="{{route('dashboard')}}" class="hover:text-yellow-400">Dashboard</a>
      <a href="{{route('users.product')}}" class="hover:text-yellow-400">List Of Item</a>
      <a href="{{route('syarat')}}" class="hover:text-yellow-400">Terms & Conditions</a>
      <a href="{{route('contact')}}" class="hover:text-yellow-400">Contact Us</a>
    </div>

    <!-- Dropdown -->
    <div class="dropdown relative">
      <button id="dropdownBtn" class="dropbtn flex items-center gap-2">
        <span>
          <div>{{ Auth::user()->name }}</div>
        </span>
      </button>
      <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-[#5b8b7a] shadow-md rounded p-2 hidden">
        <a href="{{route('profile.update')}}" class="block px-4 py-2 hover:bg-gray-500">Profile Settings</a>
        {{-- <a href="#" class="block px-4 py-2 hover:bg-gray-500"></a> --}}
        <a href="{{route('users.riwayat.index')}}" class="block px-4 py-2 hover:bg-gray-500">Rental Story</a>
        <form method="POST" action="{{route('logout')}}" class="mt-8">
        @csrf
        <button type="submit" class="w-full text-left flex items-center space-x-2 py-2 px-4 rounded hover:bg-blue-500 transition">
          <i data-lucide="log-out" class="w-5 h-5"></i><span>Logout</span>
        </button>

      </form>
      </div>
    </div>
  </div>
</header>
