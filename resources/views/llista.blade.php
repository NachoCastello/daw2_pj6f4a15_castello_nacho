@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Llistat de Professors') }}
    </h2>
@endsection

@section('content')
<div class="mt-5">
    <div class="mb-3">
        <a href="{{ route('profes.create') }}" class="btn btn-primary btn-sm">
            CREA UN PROFESSOR
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="table-primary">
                <td>ID</td>
                <td>NIF / CIF</td>
                <td>Nom</td>
                <td>Cognoms</td>
                <td>Especialitat</td>
                <td>Sueldo</td>
                <td>Accions sobre la taula</td>
            </tr>
        </thead>
        <tbody>
            @foreach($dades_professors as $profe)
                <tr>
                    <td>{{ $profe->id }}</td>
                    <td>{{ $profe->nif_cif }}</td>
                    <td>{{ $profe->nombre }}</td>
                    <td>{{ $profe->apellidos }}</td>
                    <td>{{ $profe->especialidad }}</td>
                    <td>{{ number_format($profe->sueldo, 2, ',', '.') }} €</td>
                    <td class="text-left">
                        <a href="{{ route('profes.show', $profe->id) }}" class="btn btn-info btn-sm">MOSTRA</a>
                        <a href="{{ route('profes.edit', $profe->id) }}" class="btn btn-warning btn-sm">MODIFICAR</a>
                        <form action="{{ route('profes.destroy', $profe->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Segur que vols eliminar a {{ $profe->nombre }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($dades_professors->isEmpty())
        <div class="p-3 bg-light border">
            No s'han trobat professors a la llista.
        </div>
    @endif

    <div style="margin-top: 30px;">
        <a href="{{ url('dashboard') }}"  
           style="display: inline-block; padding: 10px 20px; background-color: #ffffff; 
                  border: 1px solid #d1d5db; border-radius: 6px; text-decoration: none; 
                  color: #000000; font-weight: bold;">
            Torna al dashboard
        </a>
    </div>
</div>
@endsection
