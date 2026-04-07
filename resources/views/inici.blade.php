<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestió de Professors</title>
    </head>
<body>
<header style="text-align:center; padding:20px; background-color:#f9f9f9; border-bottom:1px solid #ddd;">
    <x-application-logo style="width:150px; display:block; margin:0 auto;" />
</header>
    <p>Pàgina inicial de l'aplicació web de Professors</p>
    <a href="{{ url('/info') }}">Info</a><br>
    
    @if (Route::has('login')) {{-- Si la ruta 'login' està registrada --}}
        @auth {{-- Si l'usuari està autenticat correctament --}}
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Log in</a><br>
        @endauth
    @endif
</body>
</html>
