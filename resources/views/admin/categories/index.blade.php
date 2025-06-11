@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    <a href="{{ route('admin.categories.create') }}" class="text-blue-600">+ Add a category</a>

    <ul class="mt-4 space-y-2">
        @foreach($categories as $category)
            <li class="border p-2 flex justify-between items-center">
                <span>{{ $category->name }}</span>
                <div>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500 mr-2">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                        onsubmit="return confirm('Are you sure? >:3')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>

                </div>
            </li>
        @endforeach
    </ul>
@endsection