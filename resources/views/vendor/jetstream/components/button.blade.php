<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-stone-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-stone-500 active:bg-stone-700 focus:outline-none focus:border-stone-700 focus:ring focus:ring-stone-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
