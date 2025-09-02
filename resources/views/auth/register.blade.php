 @vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="flex items-center justify-center min-h-screen bg-[#819A91] font-sans">
    <div class="flex w-[900px] bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold  text-[#819A91] mb-6 text-center">Register</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-4" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- No Telp --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600">Phone Number</label>
                    <input type="text" name="no_telp" placeholder="Phone Number" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-[#819A91]">
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- KTP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600">Upload KTP</label>
                    <input type="file" name="up_ktp" accept="image/*" required
                    class="w-full text-sm text-gray-600">
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
         <!-- Bagian Kanan -->
        <div class="w-1/2 bg-[#A7C1A8] flex flex-col justify-center items-center p-8 
                    rounded-l-[120px]">
            <h2 class="text-3xl font-bold text-[#819A91] mb-3">Join Us!</h2>
            <p class="text-gray-600 mb-5">Already have an account?</p>
            <a href="{{ route('login') }}" 
               class="px-6 py-3 border border-white text-white rounded hover:bg-white hover:text-[#819A91] transition">
                Login
            </a>
        </div>
    </div>

    
    

</body>