<body class="font-sans bg-[#E3E9D2] h-full">
    <div class="flex">
        <x-sidebar></x-sidebar>

        <!-- Main Content -->
        <div class="ml-[250px] flex-1">
            <x-navbar></x-navbar>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>