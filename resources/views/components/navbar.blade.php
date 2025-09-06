 <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div>
    <header class="bg-[#819A91] text-white px-6 py-3 items-center flex justify-end h-[60px]">
        <!-- <div class="flex items-center text-center ">
            <img src="../../../views/asset/logo.png" alt="" class="relative w-[50px] h-[50px] object-contain z-[1]">
            <span class="ml-3 text-xl font-bold ">Manohara Giri</span>
        </div> -->
        <div class="relative group">
            {{-- <div>{{ Auth::user()->name }}</div> ini buat nama otomatis --}}
            <!-- tombol dropdown -->
            <button class="flex items-center space-x-1 focus:outline-none " id="dropdownButton">
                <span class="ml-3 text-xl font-bold text-[#F3C327]"><div>{{ Auth::user()->name }}</div></span>
                {{-- <svg class="w-4 h-4 mt-[2px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19 9l-7 7-7-7" />
                </svg> --}}
                <i class="bi bi-caret-down text-[#F3C327]"></i>
            </button>

            <!-- Menu dropdown -->
            <div class="absolute right-0 mt-2 w-48 bg-white rounded shadow-lg hidden" id="dropdownMenu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    {{-- Link Profile Setting yang sudah distyle --}}
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-[#535252] hover:bg-[#A7C1A8] hover:text-white">Profile Setting</a>
                    
                    {{-- Tombol Logout yang distyle sama --}}
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-[#535252] hover:bg-[#A7C1A8] hover:text-white">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </header>
</div>

    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // klik lain untuk menutup menu
    document.addEventListener('click', (even)=>{
        if (!dropdownButton.contains(event.target) && dropdownMenu.contains(event.target)){
            dropdownMenu.classList.add('hidden');
       }
    })
    </script>