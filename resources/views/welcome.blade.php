<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Produkty</title>
        @include('shared.head')
    </head>
    <body>

    @auth
        Jesteś zalogowany jako {{ Auth::user()->email }} [<a href="{{ route('logout') }}">Wyloguj się</a>]
    @endauth

        @yield('content')

    </body>
</html>
