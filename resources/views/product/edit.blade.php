@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">

            <form method="post">
                @csrf
                <input type="hidden" name="action" value="save">
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                </div>

                <div class="row mt-3">
                    <div class="col-1">
                        <p>Ceny</p>
                    </div>
                    <div class="col-6">

                        @forelse($product->prices as $price)
                            <div class="row mb-1">
                                <div class="col-4">
                                    <input type="text" name="price_{{ $price->id }}" value="{{ $price->price }}" class="form-control service-input"  disabled>
                                </div>
                                <div class="col-2">
                                    <a href="?delete={{ $price->id }}" class="btn btn-danger">Usuń</a>
                                </div>
                            </div>
                        @empty
                        @endforelse

                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control" name="product_price" maxlength="10">
                            </div>
                            <div class="col-2">
                                <input type="submit" name="product_id" value="Dodaj" class="btn btn-success">
                            </div>

                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>

        </div>
        <a href="{{ route('products.index') }}" class="mt-5">Wróć</a>
    </div>

@endsection
