<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Fitxa Professor - {{ $dades_professor->nombre }}</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 12px; border: 1px solid #ddd; vertical-align: top; }
        .font-weight-bold { font-weight: bold; background-color: #f8f9fa; width: 35%; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #777; border-top: 1px solid #eee; padding-top: 5px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>DETALL DEL PROFESSOR</h1>
    </div>

    <table>
        <tbody>
            <tr>
                <td class="font-weight-bold">ID</td>
                <td>{{ $dades_professor->id }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Nom</td>
                <td>{{ $dades_professor->nombre }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Cognoms</td>
                <td>{{ $dades_professor->apellidos }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">NIF / CIF</td>
                <td>{{ $dades_professor->nif_cif }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Correu Electrònic</td>
                <td>{{ $dades_professor->email }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Telèfon</td>
                <td>{{ $dades_professor->telefono ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Especialitat</td>
                <td>{{ $dades_professor->especialidad }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Categoria professional</td>
                <td>{{ $dades_professor->categoria_profesional }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Experiència</td>
                <td>{{ $dades_professor->anyos_experiencia }} anys</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Sou Anual</td>
                <td>{{ number_format($dades_professor->sueldo, 2, ',', '.') }} €</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Data de naixement</td>
                <td>{{ \Carbon\Carbon::parse($dades_professor->fecha_nacimiento)->format('d/m/Y') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Document generat el {{ date('d/m/Y H:i') }} - Sistema de Gestió de Personal
    </div>

</body>
</html>
