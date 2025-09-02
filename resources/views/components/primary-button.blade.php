<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-[#819A91] text-white py-2 rounded-lg hover:bg-[#5D7B70] transition']) }}>
    {{ $slot }}
</button>
