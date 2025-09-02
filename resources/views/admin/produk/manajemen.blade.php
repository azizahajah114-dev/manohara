<title>Manajemen Produk</title>
<x-layout>
     <div class="max-w-7xl mx-auto bg-white rounded-md shadow-lg p-8">
        <h1 class="text-xl font-bold text-gray-800 mb-6">Manajement Produk</h1>

        <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-gray-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Variasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok saat ini</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($produk as $item)
                        @foreach ($item->variasi as $variasi)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$item->nama_produk}}</td>
                            <td class="px-6 py-4">{{$variasi->warna}}-{{$variasi->ukuran}}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">{{$variasi->stok}}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
</x-layout>