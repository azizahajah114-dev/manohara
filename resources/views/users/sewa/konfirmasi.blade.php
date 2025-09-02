@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="font-inter bg-[#D1D8BE]">
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-center text-[#819A91]">Konfirmasi Penyewaan</h1>
    
    <div class="bg-[#A7C1A8] shadow-lg rounded-2xl p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Bagian Kiri: Produk -->
      <div>
        <div class="flex items-center gap-6">
          <img src="{{asset('storage/'.$produk->foto)}}" alt="Produk" class="rounded-xl shadow-md w-48 h-40 object-cover border-4 border-[#819A91]">
          <div>
            <h2 class="text-xl font-semibold text-white">{{ $produk->nama_produk }}</h2>
            <p class="text-gray-100">{{ $produk->deskripsi }}</p>
            <p class="mt-2 text-lg font-bold text-yellow-200">Rp {{ number_format($produk->harga, 0, ',', '.') }} / hari</p>
          </div>
        </div>
      </div>

      <!-- Bagian Kanan: Formulir -->
      <div>
        {{-- cek error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Kirim data ke konfirmasi.php -->
        <form action="{{ route('sewa.store', $produk->id) }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="id_variasi" value="{{ $variasi->id }}">
          
          <!-- Alamat -->
          <div>
            <label class="block text-sm font-medium text-white">Alamat</label>
            <textarea name="alamat_pengiriman" rows="2" placeholder="Tulis alamat lengkap" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 focus:ring focus:ring-[#6d877d]" readonly>{{ $data['alamat_pengiriman'] }}</textarea>
            <input type="hidden" name="alamat_pengiriman" value="{{ $data['alamat_pengiriman'] }}">
          </div>


          <!-- Tanggal -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-white">Tanggal Sewa</label>
              <input type="text" name="tgl_sewa" value="{{ $data['tgl_sewa'] }}" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 focus:ring focus:ring-[#6d877d]" readonly>
              <input type="hidden" name="tgl_sewa" value="{{ $data['tgl_sewa'] }}">
            </div>
            <div>
              <label class="block text-sm font-medium text-white">Tanggal Selesai</label>
              <input type="text" name="tgl_kembali" value="{{ $data['tgl_kembali'] }}" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 focus:ring focus:ring-[#6d877d]" readonly>
              <input type="hidden" name="tgl_kembali" value="{{ $data['tgl_kembali'] }}">
            </div>
          </div>

          <!-- Durasi -->
          <div>
            <label class="block text-sm font-medium text-white">Durasi</label>
            <input type="text" name="durasi_sewa" value="{{ $data['durasi_sewa'] }} Hari" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 bg-gray-100" readonly>
            <input type="hidden" name="durasi_sewa" value="{{ $data['durasi_sewa'] }}">
          </div>


                  <!-- Warna yang dipilih -->
          <div class="flex justify-between border-b border-[#819A91] pb-1">
            <span class="text-sm font-medium text-white">Warna Dipilih</span>
            <span class="text-gray-100">{{ $variasi->warna }}</span>
            <input type="hidden" name="warna" value="{{ $variasi->warna }}">
          </div>

                <!-- Ukuran yang dipilih -->
        <div class="flex justify-between">
          <span class="text-sm font-medium text-white">Ukuran Dipilih</span>
          <span class="text-gray-100">{{ $variasi->ukuran }}</span>
          <input type="hidden" name="ukuran" value="{{ $variasi->ukuran }}">
        </div>

        <div class="flex justify-between">
          <span>Jumlah Barang</span> <span>{{ $data['jumlah'] }}</span>
          <input type="hidden" name="jumlah" value="{{ $data['jumlah'] }}">
        </div>


          <!-- Rincian Biaya -->
          <div class="border-t border-[#819A91] pt-4 space-y-2 text-sm text-white">
            <div class="flex justify-between">
              <span>Biaya Barang</span>
              <span>Rp {{ number_format($data['biaya_barang'],  0, ',', '.') }}</span>
              <input type="hidden" name="biaya_barang" value="{{ $data['biaya_barang'] }}">
            </div>
            <div class="flex justify-between">
              <span>Biaya Ongkir</span>
              <span>Rp {{ number_format($data['ongkir'], 0, ',', '.') }}</span>
              <input type="hidden" name="ongkir" value="{{ $data['ongkir'] }}">
            </div>
            <div class="flex justify-between font-semibold text-lg border-t border-[#819A91] pt-2">
              <span>Total Harga</span>
              <span class="text-yellow-200">Rp {{ number_format($data['total_harga'], 0, ',', '.') }}</span>
              <input type="hidden" name="total_harga" value="{{ $data['total_harga'] }}">
            </div>
          </div>

          <!-- Tombol -->
          <div class="pt-4">
            <button type="submit" class="w-full bg-[#819A91] text-white py-3 rounded-xl font-semibold hover:bg-[#6d877d] transition">
              Sewa Sekarang
            </button>
            <a href="{{route('sewa.sewa', $produk->id)}}" class="w-full bg-[#819A91] inline-block py-3 rounded-xl font-semibold mt-4 text-center text-white hover:bg-[#6d877d] transition">Kembali</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</body>