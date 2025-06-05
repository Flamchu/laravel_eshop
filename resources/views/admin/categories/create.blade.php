@extends('layouts.admin')

@section('title', 'Přidat kategorii')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Přidat novou kategorii</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Název kategorie</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-2 py-1" required>
        </div>

        <div>
            <label for="parent_id" class="block font-medium">Nadřazená kategorie (volitelné)</label>
            <select name="parent_id" id="parent_id" class="w-full border rounded px-2 py-1">
                <option value="">Žádná</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Uložit</button>
    </form>

@endsection