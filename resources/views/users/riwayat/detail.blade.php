<body class="bg-[#D1D8BE] font-sans">

  <x-header-user></x-header-user>

  <div class="max-w-4xl mx-auto py-10 px-5">
    <h1 class="text-4xl font-bold text-[#555] mb-8">Rental History Details</h1>

    <!-- Card detail -->
    <div class="bg-white shadow-lg rounded-2xl p-6 border border-[#A7C1A8]">

        @php
            $detail = $sewa->detailSewa->first();
        @endphp
      <!-- Informasi Utama -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
          <h2 class="text-xl font-semibold text-gray-700 mb-3">Informasi Transaksi</h2>
          @if ($detail && $detail->variasi && $detail->variasi->produk)
            <p><span class="font-medium">Produk:</span> {{ $detail->variasi->produk->nama_produk }}</p>
            <p><span class="font-medium">Variasi:</span> {{ $detail->variasi->warna }}, {{ $detail->variasi->ukuran }}</p>
          @else
            <p>Produk atau variasi tidak ditemukan.</p>
          @endif

          <p><span class="font-medium">Tanggal Sewa:</span> {{$sewa->tgl_sewa}}</p>
          <p><span class="font-medium">Tanggal Kembali:</span> {{$sewa->tgl_kembali}}</p>
          <p><span class="font-medium">Durasi:</span> {{$sewa->durasi_sewa}} Hari</p>
          <p><span class="font-medium">Status:</span> {{$sewa->status_sewa}}
            {{-- <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">Selesai</span> --}}
          </p>
        </div>
        
        <div>
          <h2 class="text-xl font-semibold text-gray-700 mb-3">Rincian Biaya</h2>
          <p><span class="font-medium">Biaya Barang:</span> Rp {{number_format($sewa->biaya_barang, 0, ',', '.')}}</p>
          <p><span class="font-medium">Biaya Kirim:</span> Rp {{number_format($sewa->ongkir, 0, ',', '.')}}</p>
          <p><span class="font-medium">Total:</span> <span class="font-bold">Rp {{number_format($sewa->total_harga, 0, ',', '.')}}</span></p>
        </div>
      </div>

      <!-- Bukti Pembayaran -->
      @if (!$sewa->bukti_pembayaran)
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-3">Bukti Pembayaran</h2>
            <form action="{{ route('riwayat.uploadBukti', $sewa->id) }}" method="POST" enctype="multipart/form-data" class="border rounded-lg p-4 bg-[#F9FAF9]">
            @csrf
            <div class="mb-4">
                <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran:</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*" required class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-[#6d877d]">
            </div>
            <button type="submit" class="px-4 py-2 bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">Upload</button>
            </form>
            @error('bukti_pembayaran')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
      @else
        <p>Bukti Sudah Diupload</p>
        <img src="{{ asset('storage/' . $sewa->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="rounded-lg w-72 mb-3 shadow-md">
      @endif
      <a href="{{route('users.riwayat.index')}}" class="px-4 py-2 bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">Kembali</a>
    </div>
      {{-- <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-3">Bukti Pembayaran</h2>
        <div class="border rounded-lg p-4 bg-[#F9FAF9] flex flex-col items-center">
          <img src="../Assets/image/bukti-transfer.jpg" alt="Bukti Pembayaran" class="rounded-lg w-72 mb-3 shadow-md">
          <a href="../Assets/image/bukti-transfer.jpg" target="_blank" class="px-4 py-2 bg-[#819A91] text-white rounded-lg hover:bg-[#6b817a]">Lihat Gambar</a>
        </div>
      </div> --}}

      <!-- Tombol Aksi -->
      {{-- <div class="flex justify-end space-x-3">
        <a href="riwayat.php" class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Return</a>
        <button class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
      </div> --}}
    
  

  <x-footer-user></x-footer-user>

</body>