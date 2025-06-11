@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Cart</h1>

    @if(count($cart) > 0)
        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Price</th>
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
                                <button type="submit" class="text-red-500">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="font-bold mb-4">Total: {{ $total }} Kč</p>

        <form method="POST" action="{{ route('cart.clear') }}">
            @csrf
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Complete order</button>
        </form>
    @else
        <p>The cart is empty.</p>
    @endif
@endsection