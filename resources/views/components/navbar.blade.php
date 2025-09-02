 <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div>
    <header class="bg-[#6D9280] text-white px-6 py-3 items-center flex justify-end h-[60px]">
        <!-- <div class="flex items-center text-center ">
            <img src="../../../views/asset/logo.png" alt="" class="relative w-[50px] h-[50px] object-contain z-[1]">
            <span class="ml-3 text-xl font-bold ">Manohara Giri</span>
        </div> -->
        <div class="relative group">
            {{-- <div>{{ Auth::user()->name }}</div> ini buat nama otomatis --}}
            <!-- tombol dropdown -->
            <button class="flex items-center space-x-1 focus:outline-none " id="dropdownButton">
                <span class="ml-3 text-xl font-bold text-[#F3C327]"><div>{{ Auth::user()->name }}</div></span>
                <svg class="w-4 h-4 mt-[2px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Menu dropdown -->
            <div class="absolute right-0 mt-2 w-48 bg-[#557368] rounded shadow-lg hidden" id="dropdownMenu">
                {{-- <a href="#" class="block px-4 py-2 text-sm hover:bg-[#A7C1A8]">Ubah Password</a>
                <a href="../../../controller/auth/logout.php" class="block px-4 py-2 text-sm hover:bg-[#A7C1A8]">Logout</a> --}}
                <form method="POST" action="{{route('logout')}}" class="">
                    @csrf
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-[#A7C1A8]">Ubah Password</a>
                    <button type="submit" class="block px-4 py-2 text-sm hover:bg-[#A7C1A8]">
                    <i data-lucide="log-out" class="w-5 h-5"></i><span>Logout</span>
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