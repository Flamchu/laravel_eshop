@extends('layouts.admin')

@section('title', 'Product management')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add a product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-2 py-1" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border rounded px-2 py-1">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block font-medium">Price (Kč)</label>
            <input type="number" name="price" id="price" step="0.01" class="w-full border rounded px-2 py-1" required>
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id" class="block font-medium">Category</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-2 py-1" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block font-medium">Image</label>
            <input type="file" name="image" id="image" class="w-full border rounded px-2 py-1" accept="image/*" required>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
            Save Product
        </button>
    </form>
@endsection