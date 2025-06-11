@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6 text-gray-900 dark:text-gray-100">
        <h1 class="text-3xl font-semibold mb-6">Cart</h1>

        @if(session('success'))
            <div
                class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-800 dark:text-green-100 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-200 dark:border-gray-700 mb-6">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr class="text-left text-sm font-semibold">
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-4 py-2">{{ $item['product']->name }}</td>
                                <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="px-4 py-2">{{ number_format($item['product']->price * $item['quantity'], 2) }} Kč</td>
                                <td class="px-4 py-2">
                                    <form method="POST" action="{{ route('cart.remove', $item['product']) }}">
                                        @csrf
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-6">
                <p class="text-xl font-bold">Total: {{ number_format($total, 2) }} Kč</p>
            </div>

            <form method="POST" action="{{ route('cart.checkout') }}"
                class="bg-gray-100 dark:bg-gray-800 p-6 rounded shadow-md w-full max-w-md">
                @csrf
                <h2 class="text-xl font-semibold mb-4">Checkout</h2>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 px-3 py-2 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 px-3 py-2 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-500">
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition dark:bg-blue-500 dark:hover:bg-blue-600">
                    Complete Order & Download PDF
                </button>
            </form>
        @else
            <p class="text-gray-600 dark:text-gray-400">Your cart is empty.</p>
        @endif
    </div>
@endsection