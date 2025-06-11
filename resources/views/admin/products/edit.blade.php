@extends('layouts.admin')

@section('title', 'Product management')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit a product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                class="w-full border rounded px-2 py-1" required>
        </div>

        <div>
            <label for="price" class="block font-medium">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                class="w-full border rounded px-2 py-1" required step="0.01">
        </div>

        <div>
            <label for="category_id" class="block font-medium">Category</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-2 py-1">
                <option value="">No category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($cat->id == $product->category_id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="block font-medium">Image</label>
            <input type="file" name="image" id="image" class="w-full border rounded px-2 py-1">
            @if ($product->image)
                <p class="mt-2">Current: <img src="{{ asset('storage/' . $product->image) }}" class="w-32 h-auto mt-1 rounded"
                        alt="Product image"></p>
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save changes</button>
    </form>
@endsection