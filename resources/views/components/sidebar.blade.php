@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] overflow-y-auto text-center bg-[#6D9280]">
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
                     hover:bg-[#A7C1A8] 
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
                hover:bg-[#A7C1A8] text-white" onclick="dropdown(this)" data-submenu="submenu" data-arrow="arrow">
                    <i class="bi bi-basket2"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200">Sewa</span>
                        <span class="text-sm {{request()->is('sewa*') ? 'rotate-0' : 'rotate-180'}}" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
            
            <a href="">
                <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto tetx-gray-200 hidden" id="submenu">
                    <a href="{{route('sewa.index')}}">
                        <h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1 {{ request()->is('sewa.index') ? 'text-[#F3C327]' : '' }}">Data Sewa</h1>
                    </a>
                    <a href="{{route('sewa.menunggu')}}">
                        <h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1 {{request()->is('sewa.menunggu') ? 'text-[#F3C327]' : ''}}">Menunggu Konfirmasi</h1>
                    </a>
                    <a href="{{route('sewa.pengembalian')}}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1">
                        Pengembalian Barang</h1>
                    </a>
                </div>
            </a>
            
            {{-- produk --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
            hover:bg-[#A7C1A8] text-white" onclick="dropdown(this)" data-submenu="submenu1" data-arrow="arrow1">
                <i class="bi bi-shop"></i>
                <div class="flex justify-between w-full items-center">
                    <span class="text-[15px] ml-4 text-gray-200">Produk</span>
                    <span class="text-sm rotate-180" id="arrow1">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </div>
            </div>
        
            <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto tetx-gray-200 hidden" id="submenu1">
                <a href="{{ route('produk.index')}}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1">Data Produk</h1></a>
                <a href="{{ route('variasi.index') }}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1">Variasi Produk</h1></a>
                <a href="{{ route('kategori.index') }}"><h1 class="cursor-pointer p-2 hover:bg-[#A7C1A8] rounded-md mt-1">Kategori Produk</h1></a>
                <a href="{{route('produk.manajemen')}}"><h1 class="cursor-ponter p-2 hover:bg-[#A7C1A8]">Manajemen Produk</h1></a>
            </div>

            <a href="{{route('pengguna.index')}}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
                    hover:bg-[#A7C1A8] 
                    {{ request()->is('pengguna.index') ? 'text-[#F3C327]' : '' }}">
                    <i class="bi bi-people"></i>
                    <span class="text-[15px] ml-4 
                        ">
                        Data Pengguna
                    </span>
                </div>
            </a>

            {{-- call us --}}
            {{-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
            hover:bg-[#A7C1A8] text-white">
                <i class="bi bi-chat"></i>
                <span class="text-[15px] ml-4 text-gray-200">Menghubungi</span>
            </div> --}}
            {{-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
            hover:bg-[#A7C1A8] text-white">
                <i class="bi bi-gear"></i>
                <span class="text-[15px] ml-4 text-gray-200">Kelola Halaman</span>
            </div> --}}

            {{-- laporan sewa --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer 
            hover:bg-[#A7C1A8] text-white">
                <i class="bi bi-file-earmark"></i>
                <a href="{{route('laporan.index')}}"><span class="text-[15px] ml-4 text-gray-200">Laporan</span></a>
            </div>
            

        </div>
    </div>

    <script type="text/javascript">
        function dropdown(el) {
            const submenuId = el.getAttribute('data-submenu');
            const arrowId = el.getAttribute('data-arrow');
            document.getElementById(submenuId).classList.toggle('hidden');
            document.getElementById(arrowId).classList.toggle('rotate-0');
        }
        dropdown()
        
    </script>