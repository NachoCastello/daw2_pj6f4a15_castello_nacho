<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Error 404 - Ruta no trobada</title>
        <style>
            body { font-family: sans-serif; text-align: center; background-color: #f3f4f6; padding: 50px; }
            .container { background-color: white; border-radius: 8px; padding: 40px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
            h1 { color: #e3342f; font-size: 48px; margin-bottom: 10px; }
            h2 { color: #333; margin-bottom: 20px; }
            p { color: #666; margin-bottom: 30px; }
            .btn { background-color: #3490dc; color: white; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Error 404</h1>
            <h2>Ruta Incorrecta</h2>
            <p>La pàgina que estàs buscant no existeix o la URL està mal escrita.</p>
            <a href="/" class="btn">Tornar a l'inici</a>
        </div>
    </body>
</html>
