<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-900">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        
        <div>
            <x-input-label for="no_telp" :value="__('No Telepon')" />
            <x-text-input id="no_telp" name="no_telp" type="text" class="mt-1 block w-full" :value="old('no_telp', $user->no_telp)" required autofocus autocomplete="no_telp" />
            <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" name="alamat" rows="3" class="w-full p-2 border rounded-md @error('alamat') border-red-500 @enderror">{{ old('alamat', $user->alamat) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>
        <div>
            <x-input-label for="up_ktp" :value="__('Upload KTP')" />
            {{-- <x-text-input id="up_ktp" name="up_ktp" type="file" class="mt-1 block w-full" accept="image/*" required />
            <x-input-error class="mt-2" :messages="$errors->get('up_ktp')" /> --}}
            @if ($user->up_ktp)
                <div class="mb-3">
                    <p class="">KTP Saat ini</p>
                    <img src="{{ asset('storage/' . $user->up_ktp) }}" alt="ktp" class="mt-2 w-48 h-32 object-cover rounded-md shadow-sm">
                    <div class="mt-2 flex space-x-4">
                        <a href="{{ asset('storage/' . $user->up_ktp) }}" class="text-sm text-blue-600 hover:underline">Lihat KTP</a>
                        {{-- <button type="button" onclick="document.getElementById('delete-ktp-form').submit();" class="text-sm text-red-600 hover:underline">Hapus KTP</button> --}}
                    </div>
                </div>
            @endif
            <input type="file" id="up_ktp" name="up_ktp" class="mt-1 block w-full @error('ktp_image') border-red-500 @enderror" accept="image/*" />
            <p class="text-xs text-gray-500 mt-1">Unggah file baru untuk mengubah KTP</p>
            @error('ktp_image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
                
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
