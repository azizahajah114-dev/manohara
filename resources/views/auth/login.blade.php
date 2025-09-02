@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="flex items-center justify-center min-h-screen bg-[#819A91] font-sans">
    <div class="flex  max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden w-[600px] h-[500px]">
        <!-- Bagian Kiri -->
        <div class="w-1/2  bg-[#A7C1A8]   flex flex-col justify-center items-center p-5 rounded-tr-[90px] rounded-br-[90px] ">
            <h2 class="text-2xl font-bold text-[#819A91] mb-2">Hello, Welcome!</h2>
            <p class="text-gray-600 mb-4">Don't have an account?</p>
            <a href="{{ route('register') }}" class="px-4 py-2 border border-white text-white rounded hover:bg-white hover:text-[#819A91] transition">
                Register
            </a>
        </div>

        <div class="w-1/2 p-8 flex flex-col justify-center">
            <h2 class="text-2xl font-bold text-[#819A91] text-center mb-6">Login</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded bg-[#819A91] border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</body>
    

