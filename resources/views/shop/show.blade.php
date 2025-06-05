@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mb-4 w-full">
        <p class="text-lg font-semibold">Cena: {{ $product->price }} Kč</p>
        <form method="POST" action="{{ route('cart.add', $product) }}">
            @csrf
            <input type="number" name="quantity" value="1" min="1" class="border p-1 w-16" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded ml-2">
                Přidat do košíku
            </button>
        </form>

    </div>
@endsection