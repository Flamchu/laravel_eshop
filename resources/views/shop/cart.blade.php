@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Košík</h1>

    @if(count($cart) > 0)
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th>Název</th>
                    <th>Množství</th>
                    <th>Cena</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['product']->name }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['product']->price * $item['quantity'] }} Kč</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $item['product']) }}">
                                @csrf
                                <button type="submit" class="text-red-500">Odebrat</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="font-bold mb-4">Celkem: {{ $total }} Kč</p>

        <form method="POST" action="{{ route('cart.clear') }}">
            @csrf
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Dokončit objednávku</button>
        </form>
    @else
        <p>Košík je prázdný.</p>
    @endif
@endsection