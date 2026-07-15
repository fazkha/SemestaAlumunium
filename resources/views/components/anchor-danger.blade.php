<a
    {{ $attributes->merge(['href' => '#', 'target' => '_self', 'class' => 'inline-flex items-center justify-center shadow-md rounded-lg text-xs px-5 py-2.5 text-center font-semibold uppercase tracking-widest text-white focus:ring-4 focus:outline-none focus:ring-red-300 bg-red-400 hover:bg-red-500 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
