<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Dashboard</h1>
    <hr class="border-[#F3C327] border-2 w-[150px] mt-[-10]">

    {{-- hari tanggal --}}
    {{-- @php
        use Carbon\Carbon;
        Carbon:setLocale('id');
        $today = Carbon::now()->translatedFormat('l, d F Y');
        $hari = Carbon::now()->translateFormat('l');
        $tanggal = Carbon::now()->translateFormat('d F Y');
    @endphp --}}
    <span class="font-semibold text-[#819A91]">{{ $day }},</span>
    <span class="text-[#819A91]">{{ $date }}</span>
<div>
    
</div>
<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Total User</h2>
        <p class="text-3xl font-bold">{{$totalUser}}</p>
        <!-- nnti ini pake php -->
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Total Produk</h2>
        <p class="text-3xl font-bold">{{$totalProduk}}</p>
        <!-- nnti ini pake php -->
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Transaksi Hari Ini</h2>
        <p class="text-3xl font-bold">{{$transaksiHariIni}}</p>
        <!-- nnti ini pake php -->
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        <!-- Card -->
        <div class="bg-[#778278] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">{{ $menungguKonfirmasi }}</h2>
            <p class="mt-2 uppercase tracking-wide">Menunggu Konfirmasi</p>
            <a href="{{ route('sewa.menunggu')}}" 
               class="mt-4 inline-block bg-white text-sky-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-sky-100 transition">
                Rincian →
            </a>
        </div>
    
        <div class="bg-[#819A91] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">{{$pengembalian}}</h2>
            <p class="mt-2 uppercase tracking-wide">Pengembalian</p>
            <a href="{{ route('sewa.pengembalian') }}" 
               class="mt-4 inline-block bg-white text-green-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-green-100 transition">
                Rincian →
            </a>
        </div>

        <div class="bg-[#94B7AA] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">{{$totalUser}}</h2>
            <p class="mt-2 uppercase tracking-wide">Pengguna</p>
            <a href="{{ route('pengguna.index') }}" 
               class="mt-4 inline-block bg-white text-green-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-green-100 transition">
                Rincian →
            </a>
        </div>

        <div class="bg-[#B9CEC6] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">{{$totalProduk}}</h2>
            <p class="mt-2 uppercase tracking-wide">Total Produk</p>
            <a href="{{ route('produk.index') }}" 
               class="mt-4 inline-block bg-white text-green-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-green-100 transition">
                Rincian →
            </a>
        </div>
</div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
