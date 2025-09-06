@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="font-inter bg-[#D1D8BE]">
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-center text-[#819A91]">Formulir Pembayaran</h1>
    
    <div class="bg-[#A7C1A8] shadow-lg rounded-2xl p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <div>
        <div class="flex items-center gap-6 ">
          <img src="{{ asset('storage/'.$produk->foto) }}" alt="Produk" class="rounded-xl shadow-md w-48 h-40 object-cover border-4 border-[#819A91]">
          <div>
            <h2 class="text-xl font-semibold text-white">{{ $produk->nama_produk }}</h2>
            <p class="text-gray-100">{{ $produk->deskripsi }}</p>
          </div>
        </div>
              
        @if($warna->isNotEmpty())
          <div class="mt-6">
            <h3 class="text-sm font-semibold text-gray-200">Pilih Warna:</h3>
            <div class="flex space-x-3 mt-2">
              @foreach($warna as $w)
                <label>
                  <input type="radio" name="warna" value="{{ $w }}" class="hidden">
                  <span class="w-8 h-8 inline-block rounded-full border-2 border-gray-300 cursor-pointer 
                    {{ strtolower($w) == 'olive' ? 'bg-[#7A8560]' : 'olive' }}
                    {{ strtolower($w) == 'putih' ? 'bg-[#E5E6F8]' : 'putih' }}
                    {{ strtolower($w) == 'old rose' ? 'bg-[#C98B8B]' : 'old rose' }}
                    {{ strtolower($w) == 'hitam' ? 'bg-black' : 'hitam' }}
                    {{ strtolower($w) == 'dim gray' ? 'bg-[#605959]]' : 'dim gray' }}">
                  </span>
                </label>
              @endforeach
            </div> 
          </div>
        @endif

        @if ($ukuran->isNotEmpty())
          <div class="mt-6">
            <h3 class="text-sm font-semibold text-gray-200">Pilih Ukuran:</h3>
            <div class="flex space-x-3 mt-2">
              @foreach($ukuran as $u)
                <label>
                  <input type="radio" name="ukuran" value="{{ $u }}" class="hidden">
                  <span class="px-4 py-2 rounded-lg border-2 border-gray-300 bg-white text-gray-800 font-medium cursor-pointer">
                    {{ $u }}
                  </span>
                </label>
              @endforeach
            </div>
          </div>
        @endif
        
        <div class="mt-6 space-y-4 text-white">
          <p id="stok" style="display:none">Stok: -</p>
        </div>

        <div id="jumlahSewaContainer" class="mt-6" style="display:none;">
          <label class="text-sm font-semibold text-gray-200">Jumlah Sewa:</label>
          <div class="flex items-center space-x-2 mt-2">
            <button type="button" id="kurang" class="bg-[#819A91] text-white p-2 rounded-lg font-bold w-8 h-8 flex items-center justify-center">-</button>
            <input type="number" name="jumlah" id="jumlahSewa" value="1" min="1" class="w-12 text-center border border-[#819A91] rounded-lg p-1 text-gray-800" readonly>
            <button type="button" id="tambah" class="bg-[#819A91] text-white p-2 rounded-lg font-bold w-8 h-8 flex items-center justify-center">+</button>
          </div>
        </div>
      </div>

      <div>
        <form action="{{ route('sewa.konfirmasi', $produk->id) }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="id_variasi" id="id_variasi">
          <div>
            <label class="block text-sm font-medium text-white">Alamat</label>
            <textarea name="alamat_pengiriman" cols="30" rows="8" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 focus:ring focus:ring-[#6d877d]" required>{{ old('alamat', auth()->user()->alamat) }}</textarea>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-white">Tanggal Sewa</label>
            <input type="date" name="tgl_sewa" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 focus:ring focus:ring-[#6d877d]" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-white">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" class="mt-1 block w-full border border-[#819A91] rounded-lg p-2 focus:ring focus:ring-[#6d877d]" required>
          </div>

          <div class="pt-4">
            <input type="hidden" name="jumlah" id="formJumlahSewa" value="1">
            <button type="submit" class="w-full bg-[#819A91] text-white py-3 rounded-xl font-semibold hover:bg-[#6d877d] transition">
              Konfirmasi Pembayaran
            </button>
            <a href="{{ route('users.detail', $produk->id) }}" class="w-full bg-[#819A91] inline-block py-3 rounded-xl font-semibold mt-4 text-center text-white hover:bg-[#6d877d] transition">Batal</a>
          </div>
        </form>
      </div>

    </div>
  </div>

{{-- sweet alert untuk valisi data pengguna --}}




{{-- iniuntuk jumlah +&- --}}
<script>
    let variasi = @json($variasi);

    console.log("Data Variasi Mentah:", variasi);

    function updateStok() {
        let warna = document.querySelector('input[name="warna"]:checked')?.value || null;
        let ukuran = document.querySelector('input[name="ukuran"]:checked')?.value || null;

        let stokElement = document.getElementById('stok');
        let jumlahSewaContainer = document.getElementById('jumlahSewaContainer');
        let idVariasiInput = document.getElementById('id_variasi');
        let jumlahSewaInput = document.getElementById('jumlahSewa');

        stokElement.style.display = 'none';
        jumlahSewaContainer.style.display = 'none';
        idVariasiInput.value = '';

        console.log('Pilihan Anda:', { warna, ukuran });

        let variasiDitemukan = variasi.find(v => {
            let warnaMatch = (warna === null || v.warna === warna);
            let ukuranMatch = (ukuran === null || v.ukuran === ukuran);

            if (v.ukuran === '-' && ukuran === null) {
                ukuranMatch = true;
            }

            return warnaMatch && ukuranMatch;
        });

        if (variasiDitemukan) {
            console.log('Variasi ditemukan:', variasiDitemukan);
            console.log('Stok yang ditemukan:', variasiDitemukan.stok);

            stokElement.innerText = "Stok: " + variasiDitemukan.stok;
            stokElement.style.display = 'block';
            
            if (parseInt(variasiDitemukan.stok) > 0) {
                jumlahSewaContainer.style.display = 'block';
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Stok Habis',
                    text: 'Variasi yang Anda pilih sedang tidak tersedia.',
                    confirmButtonColor: '#819A91'
                });
            }

            idVariasiInput.value = variasiDitemukan.id;
            jumlahSewaInput.value = 1;
            jumlahSewaInput.max = variasiDitemukan.stok;

        } else {
            console.log('Variasi tidak ditemukan untuk pilihan ini.');
            stokElement.innerText = "Stok: -";
            stokElement.style.display = 'block';
        }

        document.getElementById('tambah').disabled = (parseInt(jumlahSewaInput.value) >= parseInt(jumlahSewaInput.max));
        document.getElementById('kurang').disabled = (parseInt(jumlahSewaInput.value) <= 1);
    }

    document.querySelectorAll('input[name="warna"]').forEach(el => el.addEventListener('change', updateStok));
    document.querySelectorAll('input[name="ukuran"]').forEach(el => el.addEventListener('change', updateStok));
    
    document.getElementById('tambah').addEventListener('click', function(){
        let jumlahInput = document.getElementById('jumlahSewa');
        let stokTersedia = parseInt(jumlahInput.max);
        let currentVal = parseInt(jumlahInput.value);

        if (currentVal < stokTersedia) {
            jumlahInput.value = currentVal + 1;
        }
        this.disabled = (parseInt(jumlahInput.value) >= stokTersedia);
        document.getElementById('kurang').disabled = false;
    });

    document.getElementById('kurang').addEventListener('click', function(){
        let jumlahInput = document.getElementById('jumlahSewa');
        let currentVal = parseInt(jumlahInput.value);

        if (currentVal > 1) {
            jumlahInput.value = currentVal - 1;
        }

        this.disabled = (parseInt(jumlahInput.value) <= 1);    
        document.getElementById('tambah').disabled = false;
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        let idVariasi = document.getElementById('id_variasi').value;
        let jumlahSewa = document.getElementById('jumlahSewa').value;
        let stokTersedia = document.getElementById('jumlahSewa').max;

        console.log('Formulir akan dikirim...');
        console.log('ID Variasi:', idVariasi);
        console.log('Jumlah Sewa:', jumlahSewa);
        console.log('Stok Tersedia:', stokTersedia);
        
        if (!idVariasi) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Silakan pilih variasi produk (warna dan/atau ukuran) terlebih dahulu.',
                confirmButtonColor: '#819A91'
            });
            console.log('Pengiriman diblokir karena ID variasi kosong.');
        } else if (parseInt(jumlahSewa) > parseInt(stokTersedia)) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Jumlah sewa melebihi stok yang tersedia.',
                confirmButtonColor: '#819A91'
            });
            console.log('Pengiriman diblokir karena jumlah sewa melebihi stok.');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "{{ session('error') }}",
            confirmButtonColor: '#6D9280'
        })
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            confirmButtonColor: '#6D9280'
        })
    </script>
@endif


</body>