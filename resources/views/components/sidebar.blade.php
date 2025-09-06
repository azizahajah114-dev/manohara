@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] overflow-y-auto text-center bg-[#819A91]">
        <div class="text-gray-100 text-xl ">
            <div>
                <div class="p-5 mt-1  flex items-center text-center">
                    <!-- <i class="bi bi-menu-button px-2 py-1 bg-blue-600 rounded-md"></i> -->
                     <img src="{{ asset('asset/logo1.png') }}" alt="" class="relative w-[40px] h-[40px] object-contain z-[1]">
                    <h1 class="font-bold text-gray-200 text-[15px] ml-3">Manohara <span class="text-[#F3C327]">Giri</span></h1>
                    <i class="bi bi-x cursor-pointer lg:hidden"></i>
                </div>
                {{-- <hr class="my-2 text-gray-600"> --}}
            </div>

            <div class="mt-[-40px] w-[150px] ml-8">
                <img src="{{ asset('asset/nunung.png') }}" alt="" >
            </div>

            {{-- dashboard --}}
            <a href="/admin/dashboard">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
                     hover:bg-[#AAC5BB] 
                    {{ request()->is('admin/dashboard') ? 'text-[#F3C327]' : 'text-white' }}">
                    <i class="bi bi-house-door"></i>
                    <span class="text-[15px] ml-4 
                        {{ request()->is('admin/dashboard') ? 'text-[#F3C327]' : 'text-gray-200' }}">
                        Dashboard
                    </span>
                </div>
            </a>

            {{-- sewa --}}
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
                    hover:bg-[#AAC5BB] 
                    {{ request()->routeIs('sewa.*') ? 'text-[#F3C327]' : '' }}" 
                    onclick="toggleDropdown(this)">
                    <i class="bi bi-basket2"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 {{ request()->routeIs('sewa.*') ? 'text-[#F3C327]' : '' }}">Sewa</span>
                        <span class="text-sm duration-300 transition {{ request()->routeIs('sewa.*') ? 'rotate-180' : 'rotate-0' }}">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            
            <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 {{ request()->routeIs('sewa.*') ? '' : 'hidden' }}">
                <a href="{{route('sewa.index')}}">
                    <h1 class="cursor-pointer p-2 hover:bg-[#AAC5BB] rounded-md mt-1 {{ request()->routeIs('sewa.index') ? 'text-[#F3C327] bg-[#AAC5BB]' : '' }}">Data Sewa</h1>
                </a>
                <a href="{{route('sewa.menunggu')}}">
                    <h1 class="cursor-pointer p-2 hover:bg-[#AAC5BB] rounded-md mt-1 {{ request()->routeIs('sewa.menunggu') ? 'text-[#F3C327] bg-[#AAC5BB]' : '' }}">Menunggu Konfirmasi</h1>
                </a>
                <a href="{{route('sewa.pengembalian')}}">
                    <h1 class="cursor-pointer p-2 hover:bg-[#AAC5BB] rounded-md mt-1 {{ request()->routeIs('sewa.pengembalian') ? 'text-[#F3C327] bg-[#AAC5BB]' : '' }}">Pengembalian Barang</h1>
                </a>
            </div>
            
            {{-- produk --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
                hover:bg-[#AAC5BB] 
                {{ request()->routeIs('produk.*') ? 'text-[#F3C327]' : 'text-white' }}" 
                    onclick="toggleDropdown(this)">
                <i class="bi bi-shop"></i>
                <div class="flex justify-between w-full items-center">
                    <span class="text-[15px] ml-4 {{ request()->routeIs('produk.*') ? 'text-[#F3C327]' : '' }}">Produk</span>
                    <span class="text-sm duration-300 transition {{ request()->routeIs('produk.*') || request()->routeIs('variasi.*') || request()->routeIs('kategori.*') ? 'rotate-0' : '' }}">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </div>
            </div>
        
        <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 {{ request()->routeIs('produk.*') || request()->routeIs('variasi.*') || request()->routeIs('kategori.*') ? '' : 'hidden' }}">
            <a href="{{ route('produk.index')}}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1 {{ request()->routeIs('produk.index') ? 'text-[#F3C327] bg-[#AAC5BB]' : '' }}">Daftar Produk</h1></a>
            <a href="{{ route('variasi.index') }}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1 {{ request()->routeIs('variasi.index') ? 'text-[#F3C327] bg-[#AAC5BB]' : '' }}">Variasi Produk</h1></a>
            <a href="{{ route('kategori.index') }}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1 {{ request()->routeIs('kategori.index') ? 'text-[#F3C327] bg-[#AAC5BB]' : '' }}">Kategori Produk</h1></a>
        </div>

            <a href="{{ route('pengguna.index') }}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
                    hover:bg-[#AAC5BB] 
                    {{ request()->routeIs('pengguna.index') ? 'text-[#F3C327]' : 'text-white' }}">
                    <i class="bi bi-people"></i>
                    <span class="text-[15px] ml-4 
                        {{ request()->routeIs('pengguna.index') ? 'text-[#F3C327]' : 'text-gray-200' }}">
                        Data Pengguna
                    </span>
                </div>
            </a>

            {{-- laporan sewa --}}
            <a href="{{ route('laporan.index') }}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
                    hover:bg-[#AAC5BB] 
                    {{ request()->routeIs('laporan.index') ? 'text-[#F3C327]' : 'text-white' }}">
                    <i class="bi bi-file-earmark"></i>
                    <span class="text-[15px] ml-4 
                        {{ request()->routeIs('laporan.index') ? 'text-[#F3C327]' : 'text-gray-200' }}">
                        Laporan
                    </span>
                </div>
            </a>
            

        </div>
    </div>

<script type="text/javascript">
    function toggleDropdown(el) {
        const submenu = el.nextElementSibling;
        const arrow = el.querySelector('span:last-child');
        
        submenu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-0');
        arrow.classList.toggle('rotate-180');
    }
</script>