@vite(['resources/css/app.css', 'resources/js/app.js'])

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Produk - Tenda Dome 4 Orang</title>
</head>
<body class="bg-gray-100">
<x-header-user></x-header-user>
  <!-- Container -->
  <section class="max-w-7xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-6 rounded-2xl shadow-md">
      
      <!-- Gambar Produk -->
      <div class="relative">
         @if($produk->best_seller)
          <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">Best Seller</span>
        @endif
        <img src="{{ asset('storage/'.$produk->foto) }}" alt="{{$produk->nama_produk}}" 
             class="w-full h-[500px] object-cover rounded-xl shadow">
      </div>

      <!-- Detail Produk -->
<div class="flex flex-col justify-between">
  <div>
    <h1 class="text-3xl font-bold text-gray-800">{{ $produk->nama_produk }}</h1>

    <div class="flex items-center mt-2">
      <div class="flex space-x-1 text-yellow-400">
        @for ($i = 1; $i <= 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current 
              @if($i <= round($averageRating)) text-yellow-400 @else text-gray-300 @endif" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
              </svg>
        @endfor
      </div>
            {{-- <span class="ml-2 text-sm text-gray-600">({{ $reviewCount }} ulasan)</span> --}}
    </div>

    <p class="mt-3 text-gray-600">{{$produk->deskripsi}}</p>

    <p class="mt-4 text-[#819A91] text-2xl font-bold">
      Rp <?= number_format($produk["harga"], 0, ',', '.') ?> 
      <span class="text-base font-normal">/ hari</span>
    </p>

    <!-- Tombol -->
    <a href="{{route('sewa.sewa', $produk->id)}}" 
      class="mt-6 inline-block bg-[#819A91] text-white text-center py-3 px-6 rounded-lg hover:bg-teal-700">
      Sewa Sekarang
    </a>

<!-- Average Rating (pindah ke sini) -->
<div class="flex flex-col items-center justify-center bg-white shadow rounded-xl p-6 mt-12">
  <div class="text-4xl font-bold text-gray-800">4.3</div>
  <div class="flex space-x-1 mt-2">
    @for ($i = 1; $i <= 5; $i++)
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 
      @if ($i <= round($averageRating)) text-yellow-400 @else text-gray-300 @endif" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
      </svg>
    @endfor
  </div>
  <p class="text-gray-600 mt-2">({{ $reviewCount }} ulasan)</p>
</div>


  </div>
</div>
</div>

      <!-- Ulasan Pelanggan -->
      <div class="md:col-span-2 mt-8">
        <h2 class="text-2xl font-bold mb-6">Ulasan Pelanggan</h2>
        <div class="grid md:grid-cols-2 gap-12">
          
          <!-- Recent Feedbacks -->
          <div>
            <h3 class="text-xl font-semibold mb-4">Recent Feedbacks</h3>
            <div class="space-y-4">
              {{-- ULASAN DRI DATABASE --}}
              @forelse ($produk->ulasan as $ulasan)
                <div class="flex items-start space-x-4 bg-gray-50 shadow p-4 rounded-lg">
                  {{-- <img src="{{ asset('storage/'.$ulasan->foto) }}" alt=""> --}}
                  <div>
                    <p class="font-semibold text-gray-800">{{$ulasan->user?->name}}</p>
                    <div class="flex space-x-1 text-yellow-400">
                      @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current @if($i <= $ulasan->rating) text-yellow-400 @else text-gray-300 @endif" viewBox="0 0 24 24">
                          <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
                        </svg>
                      @endfor
                    </div>
                    <p class="text-gray-600 mt-1">{{$ulasan->komentar}}</p>
                    <p class="text-xs text-gray-400 mt-1">{{$ulasan->created_at->diffForHumans()}}</p>
                  </div>
                </div>
                 @empty
                <p class="text-gray-500">Belum ada ulasan untuk produk ini.</p>
                @endforelse
            </div>
            
          </div>

          <!-- Add a Review -->
          <div>
            <h3 class="text-xl font-semibold mb-4">Tambah Ulasan</h3>
            <form method="POST" action="{{route('ulasan.store', $produk->id)}}" class="bg-gray-50 shadow rounded-xl p-6 space-y-4">
              @csrf
              <div>
                <label class="block text-sm font-medium mb-1">Beri Rating</label>
                <div class="flex space-x-1 cursor-pointer">
                  @for ($i = 1; $i <= 5; $i++)
                    <svg onclick="setRating({{ $i }})" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 rating-star text-gray-300 hover:text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
                    </svg>
                  @endfor
                </div>
                <input type="hidden" name="rating" id="rating" value="0">
              </div>
              {{-- <div>
                <input type="text" name="nama" placeholder="Nama" required
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
              </div> --}}
              <div>
                <textarea name="komentar" placeholder="Tulis ulasan..." required
                          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none"></textarea>
              </div>
              <button type="submit" class="w-full bg-[#819A91] text-white py-3 rounded-lg hover:bg-teal-700">
                Kirim Ulasan
              </button>
            </form>
          </div>

        </div>
      </div>

    </div>
  </section>
<x-footer-user></x-footer-user>
  <script>
    // Rating selector
    function setRating(value) {
      document.getElementById('rating').value = value;
      const stars = document.querySelectorAll('.rating-star');
      stars.forEach((star, index) => {
        if (index < value) {
          star.classList.add('text-yellow-400');
          star.classList.remove('text-gray-300');
        } else {
          star.classList.add('text-gray-300');
          star.classList.remove('text-yellow-400');
        }
      });
    }
  </script>

</body>
</html>