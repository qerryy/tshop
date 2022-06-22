<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-gray-50 border border-gray-400 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-100 active:bg-gray-100 focus:outline-none focus:border-gray-200 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
