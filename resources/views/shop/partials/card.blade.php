<a href="{{ route('shop.show', $product) }}"
    class="group relative block overflow-hidden bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg dark:hover:shadow-gray-700/50 transition-all duration-300 ease-in-out transform hover:-translate-y-1 border border-gray-200 dark:border-gray-700">

    <div class="relative overflow-hidden h-56">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
    </div>

    <div class="p-4 text-center">
        <h3
            class="text-lg font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors mb-1 line-clamp-2">
            {{ $product->name }}
        </h3>

        <div class="mt-3 flex items-center justify-center">
            <span class="text-xl font-extrabold text-amber-600 dark:text-amber-500">{{ $product->price }} Kč</span>

            @if($product->original_price)
                <span class="ml-2 text-sm text-gray-400 dark:text-gray-500 line-through">{{ $product->original_price }}
                    Kč</span>
            @endif
        </div>

        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <button
                class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-600 text-white text-sm font-medium rounded-md transition-colors">
                Product detail
            </button>
        </div>
    </div>
</a>