@extends('welcome')
@section('content')
        <div class="row">
            <h3>{{ $product->name }}</h3>
            <p>id: {{ $product->id }}</p>
            <p>{{ $product->description }}</p>
            @if(!$product->prices->isEmpty())
                <p>Dostępny w cenach:</p>
                <ul>
                    @foreach($product->prices as $product_price)
                        <li>{{ $product_price->price }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <a href="{{ route('products.index') }}" class="mt-5">Wróć</a>

@endsection
