<a href="{{ route('shop.show', $product) }}" class="border p-2 block hover:shadow rounded">
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
        class="mb-2 w-full h-48 object-cover">
    <div class="text-center">
        <h2 class="font-semibold">{{ $product->name }}</h2>
        <p>{{ $product->price }} Kč</p>
    </div>
</a>