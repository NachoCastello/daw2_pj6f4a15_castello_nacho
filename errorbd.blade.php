<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Error d'accés a la BD</title>
    </head>
    <body>
        <header style="text-align:center; padding:20px; background-color:#f9f9f9; border-bottom:1px solid #ddd;">
            <x-application-logo style="width:150px; display:block; margin:0 auto;" />
        </header>
        <h1>Atenció!!!!</h1>
        <p>Error tipus: "SQLSTATE[HY000] [2002] Connection refused"</p>
        <p>
        Comprova que:
        <ol>
            <li>El servidor MySQL està en marxa</li>
            <li>L'adreça IP i/o nom del host són correctes</li>
            <li>El port del servidor és correcte</li>
        </ol>
        </p>
    </body>
</html>
