<x-layout>
    <h1 class="text-2xl font-bold mb-4 text-[#6D9280]">Data <span class="text-[#F3C327]">Pengguna</span></h1>
    <div class="border-[#819A91] border-2 border-solid shadow-md p-4 mt-[50px]">
        <h2 class="text-sm font-semibold text-gray-600 mb-4 ">Daftar Pengguna</h2> 

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">No</th>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Nama</th>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Email</th>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Telp</th>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Alamat</th>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">KTP</th>
                        <th class="border border-[#F6EFEF] bg-[#A7C1A8] px-3 py-2 text-center font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr class="border-b">
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $i+1 }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $user->name }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $user->email }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $user->no_telp }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">{{ $user->alamat ?? '-' }}</td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                @if($user->up_ktp)
                                    <img src="{{ asset('storage/'.$user->up_ktp) }}" alt="ktp" class="rounded-lg w-32 mb-2">
                                @else
                                    Tidak ada
                                @endif
                            </td>
                            <td class="border border-[#F6EFEF] px-3 py-2 text-center font-semibold text-gray-800">
                                <a href="{{ route('pengguna.detail', $user->id) }}" 
                                   class="bg-[#6D9280] text-white px-3 py-1 hover:bg-[#557866]">
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
