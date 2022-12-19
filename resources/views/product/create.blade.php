@extends('welcome')
@section('content')
        <div class="row">

            <form method="post">
                @csrf
                <input type="hidden" name="action" value="save">
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>

        </div>
        <a href="{{ route('products.index') }}" class="mt-5">Wróć</a>

@endsection
