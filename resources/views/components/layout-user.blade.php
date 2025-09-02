<body class="font-inter bg-[#D1D8BE]  h-full">
    <div class="flex">
        <x-header-user></x-header-user>

        <div class="ml-[250px] flex-1">

            <main class="mx-auto max-w-7xl py-6 lg:px-8">
                {{ $slot }}

                <x-footer-user></x-footer-user>
            </main>
        </div>
    </div>
</body>

