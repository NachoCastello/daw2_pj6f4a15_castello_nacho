<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Empresa</title>
    </head>
    <body>
        <header style="text-align:center; padding:20px; background-color:#f9f9f9; border-bottom:1px solid #ddd;">
            <a href="{{ url('/') }}">
                <x-application-logo style="width:150px; display:block; margin:0 auto;" />
            </a>
        </header>
        <p>Pàgina informativa de l'aplicació web Empresa</p>
        <p>
        Aquesta aplicació té 2 tipus d'usuaris:
        <ol>
            <li>Administrador: crea/modifica/esborra/visualitza treballadors</li>
            <li>Basic: visualitzar treballadors</li>
        </ol>
        <a href="{{ url('/') }}">Inici</a><br>
        </p>
    </body>
</html>
