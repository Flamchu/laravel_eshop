@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-indigo-700 dark:text-indigo-300 mb-2">All Available Products</h1>
                <div class="w-20 h-1 bg-amber-500 dark:bg-amber-400"></div>
            </div>

            <div
                class="mb-10 bg-indigo-50 dark:bg-indigo-900/50 rounded-lg p-4 border border-indigo-100 dark:border-indigo-800">
                @include('shop.partials.categories')
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-10">
                @foreach($products as $product)
                    @include('shop.partials.card', ['product' => $product])
                @endforeach
            </div>

            <div class="flex justify-center mt-8">
                {{ $products->links('pagination::tailwind-custom') }}
            </div>
        </div>
    </div>
@endsection