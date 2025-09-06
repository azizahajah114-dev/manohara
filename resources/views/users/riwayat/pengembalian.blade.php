@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="bg-[#D1D8BE] font-sans">
    <x-header-user></x-header-user>
    <div class="max-w-4xl mx-auto py-10 px-5">
        <h2 class="max-4xl font-bold text-[#555] mb-9">Upload Bukti Pengembalian</h2>

        {{-- card --}}
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-[#A7C1A8]">
            @if (session('success'))
    <div class="text-green-600 text-sm mb-2">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="text-red-600 text-sm mb-2">{{ session('error') }}</div>
@endif
            @if (!$sewa->pengembalian || !$sewa->pengembalian->bukti_pengembalian)
                <form action="{{route('riwayat.uploadBuktiPengembalian', $sewa->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-5">Upload Bukti Pengembalian:</label>
                  <input type="file" name='bukti_pengembalian' id="bukti_pengembalian" accept="image/*" required class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-[#6d877d]">
                   

                  <button type="submit" class="px-4 py-2 mt-6 bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">Upload</button>
                  @error('bukti_pengembalian')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                  @enderror
                </form>
                @else
                <p>Bukti Pengembalian Sudah Diupload</p>
                <img src="{{ asset('storage/' . $sewa->pengembalian->bukti_pengembalian) }}" alt="Bukti Pengembalian" class="rounded-lg w-72 mb-3 shadow-md">
            @endif
            <a href="{{route('users.riwayat.index')}}" 
            class="px-4 py-2 bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">Kembali</a>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>