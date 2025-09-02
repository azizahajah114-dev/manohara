@vite(['resources/css/app.css', 'resources/js/app.js'])

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ManoharaGiri - Rental Alat Daki</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
</head>
<body class="font-inter bg-[#D1D8BE]">
  <div class="wrap">

   <x-header-user></x-header-user>

    <!-- Section Syarat & Ketentuan -->
    <section id="terms" class="px-6 py-10">
      <h2 class="text-center text-3xl font-bold mb-8 text-[#819A91]">Syarat & Ketentuan</h2>

      <!-- Card 1 -->
      <div class="bg-white shadow-lg rounded-xl p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4 text-[#819A91]">Hal Yang Perlu Diketahui</h3>
        <ul class="list-disc list-inside space-y-2 text-gray-700">
          <li>Harga tersebut terhitung mulai 2 hari sewa. (contoh: diambil Jum'at kembali Minggu → 2 hari sewa)</li>
          <li>Tidak harus per 24 jam, bebas ambil & kembalikan di jam operasional (08.00-21.00).</li>
          <li>Tidak melayani pengambilan dan pengembalian di luar jam operasional.</li>
          <li>Terlambat mengembalikkan dianggap menambah hari sewa.</li>
          <li>Alat yang sudah dibawa tetapi tidak terpakai tetap terhitung sewa.</li>
          <li>Walaupun tidak dikembalikan sebelum jadwal kembali, uang tidak dapat di refund.</li>
        </ul>
      </div>

      <!-- Card 2 -->
      <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 text-[#819A91]">Apa Saja Yang Dibutuhkan</h3>
        <ul class="list-disc list-inside space-y-2 text-gray-700">
          <li>Jaminan berupa KTP dan KK asli (bukan fotocopy).</li>
          <li>Tidak menerima kartu pelajar / mahasiswa saja. Jika belum punya KTP, bisa pakai identitas orangtua + kartu pelajar.</li>
          <li>Pengembalian harus dilakukan oleh orang yang sama dengan identitas saat pengambilan.</li>
        </ul>
      </div>
    </section>
  </div>
    <x-footer-user></x-footer-user>
    <script>
  const dropdownBtn = document.getElementById("dropdownBtn");
  const dropdownMenu = document.getElementById("dropdownMenu");

  dropdownBtn.addEventListener("click", () => {
    dropdownMenu.classList.toggle("hidden");
  });

  document.addEventListener("click", (e) => {
    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.add("hidden");
    }
  });
</script>
</body>
</html>
