<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Dashboard</h1>
    <p class="mb-4">Selamat datang di dashboard admin!</p>

<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Total User</h2>
        <p class="text-3xl font-bold"></p>
        <!-- nnti ini pake php -->
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Total Produk</h2>
        <p class="text-3xl font-bold"></p>
        <!-- nnti ini pake php -->
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Transaksi Hari Ini</h2>
        <p class="text-3xl font-bold">12</p>
        <!-- nnti ini pake php -->
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        <!-- Card -->
        <div class="bg-[#778278] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">2</h2>
            <p class="mt-2 uppercase tracking-wide">Menunggu Konfirmasi</p>
            <button class="mt-4 bg-white text-sky-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-sky-100 transition">
                Rincian →
            </button>
        </div>
    
        <div class="bg-[#819A91] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">0</h2>
            <p class="mt-2 uppercase tracking-wide">Pengembalian</p>
            <button class="mt-4 bg-white text-green-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-green-100 transition">
                Rincian →
            </button>
        </div>

        <div class="bg-[#94B7AA] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">140</h2>
            <p class="mt-2 uppercase tracking-wide">Pengguna</p>
            <button class="mt-4 bg-white text-green-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-red-100 transition">
                <a href="{{ route('pengguna.index') }}">Rincian →</a>
            </button>
        </div>

        <div class="bg-[#B9CEC6] rounded-lg shadow p-6 text-center text-white">
            <h2 class="text-4xl font-bold">50</h2>
            <p class="mt-2 uppercase tracking-wide">Total Produk</p>
            <button class="mt-4 bg-white text-green-500 px-4 py-1 rounded-full text-sm font-semibold hover:bg-red-100 transition">
                <a href="{{ route('produk.index') }}">Rincian →</a>
            </button>
        </div>
</div>
</x-layout>