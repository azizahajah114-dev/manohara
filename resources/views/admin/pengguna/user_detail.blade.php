<x-layout>
    <div class="bg-white rounded-lg shadow p-6 border mt-[50px] max-w-xl mx-auto">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Detail Pengguna</h2>

        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>No Telp:</strong> {{ $user->no_telp }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>
        
        <p><strong>KTP:</strong></p>
        @if($user->up_ktp)
            <img src="{{ asset('storage/'.$user->up_ktp) }}" alt="KTP" class="w-64 mt-2 border rounded">
        @else
            <span>Tidak ada</span>
        @endif

        <div class="mt-4">
            <a href="{{ route('pengguna.index') }}" class="bg-[#819A91] text-white px-4 py-2 rounded-[5px]  hover:bg-gray-600">
                Kembali
            </a>
        </div>
    </div>
</x-layout>
