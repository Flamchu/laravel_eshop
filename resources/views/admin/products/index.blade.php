@extends('layouts.admin')

@section('title', 'Produkty')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Seznam produktů</h1>

    <a href="{{ route('admin.products.create') }}" class="text-blue-600">+ Přidat produkt</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-2 py-1">Název</th>
                <th class="border border-gray-300 px-2 py-1">Cena</th>
                <th class="border border-gray-300 px-2 py-1">Kategorie</th>
                <th class="border border-gray-300 px-2 py-1">Akce</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="border border-gray-300 px-2 py-1">{{ $product->name }}</td>
                    <td class="border border-gray-300 px-2 py-1">{{ number_format($product->price, 2, ',', ' ') }} Kč</td>
                    <td class="border border-gray-300 px-2 py-1">{{ $product->category->name ?? 'Žádná' }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Upravit</a>

                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                            onsubmit="return confirm('Opravdu chcete smazat tento produkt?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Smazat</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection