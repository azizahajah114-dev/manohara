@vite(['resources/css/app.css', 'resources/js/app.js'])

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Produk - Tenda Dome 4 Orang</title>
</head>
<body class="bg-gray-100 text-sm">
<x-header-user></x-header-user>

  <!-- Container -->
  <section class="max-w-6xl mx-auto px-3 py-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-white p-4 rounded-xl shadow">
<!-- Gambar Produk -->
<div class="relative flex justify-center items-center">
  @if($produk->best_seller)
    <span class="absolute top-1 left-1 bg-[#F3C327] text-white text-[10px] font-bold px-1.5 py-0.5 rounded">Best Seller</span>
  @endif
  <img src="{{ asset('storage/'.$produk->foto) }}" alt="{{$produk->nama_produk}}" 
       class="max-h-[300px] w-auto object-contain rounded-lg shadow mx-auto">
</div>

      <!-- Detail Produk -->
      <div class="flex flex-col justify-between">
        <div>
          <h1 class="text-xl font-bold text-gray-800">{{ $produk->nama_produk }}</h1>

          <div class="flex items-center mt-1">
            <div class="flex space-x-0.5 text-yellow-400">
              @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current 
                  @if($i <= round($averageRating)) text-yellow-400 @else text-gray-300 @endif" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
                </svg>
              @endfor
            </div>
          </div>

          <p class="mt-2 text-gray-600 text-xs">{{$produk->deskripsi}}</p>

          <p class="mt-3 text-[#819A91] text-lg font-bold">
            Rp <?= number_format($produk["harga"], 0, ',', '.') ?> 
            <span class="text-xs font-normal">/ hari</span>
          </p>

          <!-- Tombol -->
          <a href="{{route('sewa.sewa', $produk->id)}}" 
            class="mt-4 inline-block bg-[#819A91] text-white text-center py-2 px-4 rounded-md hover:bg-[#68867B]] text-sm">
            Sewa Sekarang
          </a>
          <!-- Tombol Kembali -->
          <a href="{{ route('users.product') }}" 
            class="mt-2 inline-block bg-white text-[#819A91] border border-[#819A91] text-center py-2 px-4 rounded-md hover:bg-gray-100 text-sm">
            Kembali
          </a>


          <!-- Average Rating -->
          <div class="flex flex-col items-center justify-center bg-white shadow rounded-lg p-4 mt-6">
            <div class="text-xl font-bold text-gray-800">4.3</div>
            <div class="flex space-x-0.5 mt-1">
              @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 
                @if ($i <= round($averageRating)) text-yellow-400 @else text-gray-300 @endif" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
                </svg>
              @endfor
            </div>
            <p class="text-gray-600 mt-1 text-xs">({{ $reviewCount }} ulasan)</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Ulasan Pelanggan -->
    <div class="md:col-span-2 mt-6">
      <h2 class="text-lg font-bold mb-4">Ulasan Pelanggan</h2>
      <div class="grid md:grid-cols-2 gap-6">

        <!-- Recent Feedbacks -->
        <div>
          <h3 class="text-base font-semibold mb-2">Recent Feedbacks</h3>
          <div class="space-y-3">
            @forelse ($produk->ulasan as $ulasan)
              <div class="flex items-start space-x-3 bg-gray-50 shadow p-3 rounded-md">
                <div>
                  <p class="font-semibold text-gray-800 text-sm">{{$ulasan->user?->name}}</p>
                  <div class="flex space-x-0.5 text-yellow-400">
                    @for ($i = 1; $i <= 5; $i++)
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-current @if($i <= $ulasan->rating) text-yellow-400 @else text-gray-300 @endif" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
                      </svg>
                    @endfor
                  </div>
                  <p class="text-gray-600 mt-1 text-xs">{{$ulasan->komentar}}</p>
                  <p class="text-[10px] text-gray-400 mt-1">{{$ulasan->created_at->diffForHumans()}}</p>
                </div>
              </div>
            @empty
              <p class="text-gray-500 text-xs">Belum ada ulasan untuk produk ini.</p>
            @endforelse
          </div>
        </div>

        <!-- Add a Review -->
        <div>
          <h3 class="text-base font-semibold mb-2">Tambah Ulasan</h3>
          <form method="POST" action="{{route('ulasan.store', $produk->id)}}" class="bg-gray-50 shadow rounded-md p-4 space-y-3">
            @csrf
            <div>
              <label class="block text-xs font-medium mb-1">Beri Rating</label>
              <div class="flex space-x-0.5 cursor-pointer">
                @for ($i = 1; $i <= 5; $i++)
                  <svg onclick="setRating({{ $i }})" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 rating-star text-gray-300 hover:text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431L24 9.587l-6 5.847L19.335 24 12 20.013 4.665 24 6 15.434 0 9.587l8.332-1.569z"/>
                  </svg>
                @endfor
              </div>
              <input type="hidden" name="rating" id="rating" value="0">
            </div>
            <div>
              <textarea name="komentar" placeholder="Tulis ulasan..." required
                        class="w-full p-2 border rounded-md text-sm focus:ring-1 focus:ring-yellow-400 focus:outline-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-[#819A91] text-white py-2 rounded-md hover:bg-[#68867B] text-sm">
              Kirim Ulasan
            </button>
          </form>
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
