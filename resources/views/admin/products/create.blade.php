@extends('layouts.admin')

@section('title', 'Přidat produkt')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Přidat nový produkt</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Název</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-2 py-1" required>
        </div>

        <div>
            <label for="price" class="block font-medium">Cena (Kč)</label>
            <input type="number" name="price" id="price" step="0.01" class="w-full border rounded px-2 py-1" required>
        </div>

        <div>
            <label for="category_id" class="block font-medium">Kategorie</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-2 py-1" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="block font-medium">Obrázek</label>
            <input type="file" name="image" id="image" class="w-full border rounded px-2 py-1" accept="image/*" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Uložit</button>
    </form>
@endsection