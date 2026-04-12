<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Informació de l'Aplicació</title>
        <style>
            body { font-family: sans-serif; background-color: #f3f4f6; color: #333; margin: 0; padding: 0; }
            header { text-align: center; padding: 20px; background-color: white; border-bottom: 2px solid #e5e7eb; }
            .container { max-width: 800px; margin: 40px auto; background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
            h1 { color: #1f2937; margin-top: 0; font-size: 24px; border-bottom: 2px solid #e5e7eb; padding-bottom: 10px; }
            h2 { color: #3b82f6; font-size: 18px; margin-top: 25px; }
            p, ul { line-height: 1.6; color: #4b5563; text-align: justify; }
            .btn { display: inline-block; background-color: #4f46e5; color: white; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; margin-top: 20px; text-align: center; font-size: 14px; }
            .btn:hover { background-color: #4338ca; }
        </style>
    </head>
    <body>
        <header>
            <a href="{{ url('/') }}">
                <x-application-logo style="width:120px; display:inline-block;" />
            </a>
        </header>

        <div class="container">
            <h1>📄 Pàgina Informativa</h1>
            
            <h2>1. Propòsit de l'aplicació</h2>
            <p>
                Aquesta aplicació web serveix per gestionar la base de dades del personal docent de l'empresa. El sistema compta amb un tauler unificat restringit depenent de l'autorització, tenint dos tipus de perfils:
            </p>
            <ul>
                <li><strong>Gestor (%):</strong> Rol d'administració. Pot afegir, modificar, visualitzar el detall i eliminar tant perfils de professors de la base de dades com als propis usuaris. També pot exportar els corresponents documents PDF.</li>
                <li><strong>Consultor:</strong> Rol restringit. Només té opcions de lectura. Pot visualitzar el llistat principal i la fitxa dels professors del sistema, a més de generar els seus informes en format PDF.</li>
            </ul>

            <h2>2. Com validar-se i accedir (Login)</h2>
            <p>
                Per accedir al tauler de l'aplicació, has d'adreçar-te a la pàgina principal de validació de credencials. Veuràs un formulari on hauràs d'emplenar les següents dades obligatòries:
            </p>
            <ul>
                <li><strong>Correu electrònic:</strong> El teu correu corporatiu.</li>
                <li><strong>Contrasenya:</strong> La teva clau secreta de seguretat personal d'accés.</li>
            </ul>
            <p>Un cop polsis sobre el botó d'accés ("L O G I N"), si les credencials són vàlides, el sistema verificarà la teva identitat i entraràs automàticament al teu tauler privat depenent del teu rol (<em>Dashboard</em> o <em>Dashboard-Basic</em>). Si erres al teclejar, t'apareixerà una pàgina d'avís de credencials incorretes.</p>

            <h2>3. Com sortir de l'aplicació (Logout)</h2>
            <p>
                És molt important tancar la sessió sempre que acabis de treballar per protegir les dades dels professors, i sobretot si col·labores d'un terminal públic. Per fer-ho correctament des de qualsevol interfície d'un usuari autenticat:
            </p>
            <ul>
                <li>A la barra superior de navegació (acantonada a mà dreta), fixat en el teu nom d'usuari i la fletxeta de desplegament.</li>
                <li>Fes clic al teu <strong>nom d'usuari</strong> per poder visualitzar la pastilla i, tot seguit, prem l'opció <strong>Log Out</strong>.</li>
                <li>El sistema destruirà el teu testimoni (token) d'accès web i la teva sessió en curs, redirigint-te directament d'esquitllada a la pàgina d'Inici de visitant.</li>
            </ul>

            <div style="text-align: center; margin-top: 40px;">
                <a href="{{ url('/') }}" class="btn">TORNAR A L'INICI</a>
            </div>
        </div>
    </body>
</html>
