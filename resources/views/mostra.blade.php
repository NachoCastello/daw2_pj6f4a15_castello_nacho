@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vista Profesor:') }}
    </h2>
@endsection

@section('content')
<div class="py-12" style="background-color: #f3f4f6; min-height: 100vh; font-family: sans-serif;">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-lg rounded-xl overflow-hidden" style="border: 1px solid #e5e7eb;">

            <div class="px-8 py-6 border-b border-gray-100" style="background: linear-gradient(to right, #ffffff, #f9fafb);">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h2 style="font-size: 28px; font-weight: 800; color: #111827; margin-top: 10px;">
                            {{ $dades_professors->nombre }} {{ $dades_professors->apellidos }}
                        </h2>
                    </div>
                    <div style="text-align: right;">
                        <span style="color: #9ca3af; font-size: 12px; display: block; margin-right: 20px;">Identificador</span>
                        <span style="font-family: monospace; font-weight: bold; color: #374151; margin-right: 20px;">ID-{{ $dades_professors->id }}</span>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr class="table-primary">
                                <th scope="col" style="width: 30%;">CAMP</th>
                                <th scope="col">VALOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">ID</td>
                                <td>{{ $dades_professors->id }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nom</td>
                                <td>{{ $dades_professors->nombre }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Cognoms</td>
                                <td>{{ $dades_professors->apellidos }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">NIF / CIF</td>
                                <td>{{ $dades_professors->nif_cif }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Correu Electrònic</td>
                                <td>{{ $dades_professors->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Telèfon</td>
                                <td>{{ $dades_professors->telefono ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Especialitat</td>
                                <td>{{ $dades_professors->especialidad }}</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Categoria professional</td>
                                <td>{{ $dades_professors->categoria_profesional }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Experiència</td>
                                <td>{{ $dades_professors->anyos_experiencia }} anys</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Sou Anual</td>
                                <td>{{ number_format($dades_professors->sueldo, 2, ',', '.') }} €</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Data de naixement</td>
                                <td>{{ \Carbon\Carbon::parse($dades_professors->fecha_nacimiento)->format('d/m/Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>

		<div style="padding: 20px 32px; display: flex; align-items: center; gap: 12px; border-top: 1px solid #e5e7eb; background-color: #f9fafb;">
		    
		    <a href="{{ url('dashboard') }}" 
		       style="color: #6b7280; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db; margin-right: auto;">
		        Torna al dashboard
		    </a>

		    @if(Auth::user()->role === 'gestor')
		        <a href="{{ route('profes.edit', $dades_professors->id) }}" 
		           style="background-color: #4f46e5; color: white; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px;">
		            MODIFICAR
		        </a>
		    @endif

		    <a href="{{ route('profes.index') }}" 
		       style="color: #374151; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db; background-color: white;">
		        TORNAR
		    </a>

<div style="margin-top: 20px;">
    <a href="{{ route('profes.pdf.detall', $dades_professors->id) }}" 
       class="btn btn-danger" 
       style="font-weight: bold; padding: 10px 24px; border-radius: 6px; text-decoration: none; display: inline-block; background-color: #dc3545; color: white; border: none;">
        GENERAR PDF DE LA FITXA
    </a>
</div>

		</div>
        </div>
    </div>
</div>
@endsection
