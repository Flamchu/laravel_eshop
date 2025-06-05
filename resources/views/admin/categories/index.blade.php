@extends('layouts.admin')

@section('title', 'Kategorie')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Seznam kategorií</h1>

    <a href="{{ route('admin.categories.create') }}" class="text-blue-600">+ Přidat kategorii</a>

    <ul class="mt-4 space-y-2">
        @foreach($categories as $category)
            <li class="border p-2 flex justify-between items-center">
                <span>{{ $category->name }}</span>
                <div>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                        onsubmit="return confirm('Opravdu chcete smazat tuto kategorii?')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Smazat</button>
                    </form>

                </div>
            </li>
        @endforeach
    </ul>
@endsection