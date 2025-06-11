@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <a href="{{ route('admin.products.create') }}" class="text-blue-600">+ Add a product</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-2 py-1">Name</th>
                <th class="border border-gray-300 px-2 py-1">Price</th>
                <th class="border border-gray-300 px-2 py-1">Category</th>
                <th class="border border-gray-300 px-2 py-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="border border-gray-300 px-2 py-1">{{ $product->name }}</td>
                    <td class="border border-gray-300 px-2 py-1">{{ number_format($product->price, 2, ',', ' ') }} Kč</td>
                    <td class="border border-gray-300 px-2 py-1">{{ $product->category->name ?? 'None' }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Edit</a>

                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                            onsubmit="return confirm('Are you sure? >:3')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection