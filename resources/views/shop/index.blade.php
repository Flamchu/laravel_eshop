@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">All available products</h1>

    @include('shop.partials.categories')

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($products as $product)
            @include('shop.partials.card', ['product' => $product])
        @endforeach
    </div>

    {{ $products->links() }}
@endsection