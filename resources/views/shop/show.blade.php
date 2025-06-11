@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div
            class="max-w-6xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Breadcrumb Navigation -->
            <nav class="bg-gray-50 dark:bg-gray-700/50 px-6 py-3 text-sm">
                <ol class="flex items-center space-x-2 text-gray-600 dark:text-gray-300">
                    <li><a href="{{ route('shop.index') }}"
                            class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Shop</a></li>
                    <li class="text-gray-400 dark:text-gray-500">/</li>
                    <li class="text-gray-900 dark:text-gray-100 font-medium">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="md:flex">
                <div class="md:w-1/2 p-6">
                    <div class="sticky top-6">
                        <div class="mb-4 rounded-xl overflow-hidden shadow-lg bg-gray-100 dark:bg-gray-700">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-auto object-cover transition-opacity duration-300 hover:opacity-90">
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 p-6">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $product->name }}</h1>
                    </div>

                    <div class="prose max-w-none dark:prose-invert mb-8">
                        <div class="flex items-center">
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $product->description }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center">
                            <span class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ $product->price }}
                                Kč</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('cart.add', $product) }}" class="mb-8">
                        @csrf
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="flex items-center border dark:border-gray-600 rounded-lg overflow-hidden">
                                <button type="button"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                    class="px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                    −
                                </button>
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock ?? 10 }}"
                                    class="w-16 text-center border-0 focus:ring-0 bg-white dark:bg-gray-800 dark:text-gray-100 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                    +
                                </button>
                            </div>
                            <button type="submit"
                                class="flex-1 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-md hover:shadow-lg">
                                Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection