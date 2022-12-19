<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Produkty</title>
        @include('shared.head')
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @auth
                    Jesteś zalogowany jako {{ Auth::user()->email }} [<a href="{{ route('logout') }}">Wyloguj się</a>]
                @endauth
            </div>

        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
        </div>

        @yield('content')
    </div>

    </body>
</html>
