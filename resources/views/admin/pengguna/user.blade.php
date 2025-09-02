<x-layout>
    <div class="bg-white rounded-lg shadow p-4 border mt-[50px] w-[140vh]">
        <h2 class="text-sm font-semibold text-gray-600 mb-4 ">Daftar Pengguna</h2> 

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">No</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Nama</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Email</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Telp</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Alamat</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">KTP</th>
                        <th class="px-3 py-2 text-left font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr class="border-b">
                            <td class="px-3 py-2">{{ $i+1 }}</td>
                            <td class="px-3 py-2">{{ $user->name }}</td>
                            <td class="px-3 py-2">{{ $user->email }}</td>
                            <td class="px-3 py-2">{{ $user->no_telp }}</td>
                            <td class="px-3 py-2">{{ $user->alamat ?? '-' }}</td>
                            <td class="px-3 py-2">
                                @if($user->up_ktp)
                                    <img src="{{ asset('storage/'.$user->up_ktp) }}" alt="ktp" class="rounded-lg w-32 mb-2">
                                @else
                                    Tidak ada
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                <a href="{{ route('pengguna.detail', $user->id) }}" 
                                   class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                                   Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
