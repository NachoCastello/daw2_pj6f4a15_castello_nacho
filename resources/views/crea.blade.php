@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Crea un Profesor') }}
    </h2>
@endsection


@section('content')
<div class="py-12" style="background-color: #f3f4f6; min-height: 100vh;">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden">

            <div class="px-8 py-6 border-b border-gray-100" style="background-color: #ffffff;">
                <h2 class="text-2xl font-bold text-gray-800">Afegeix un nou professor</h2>
                <p class="text-sm text-gray-500 mt-1">Omple el formulari per registrar el personal al sistema.</p>
            </div>

            <div class="p-8">
                @if ($errors->any())
                    <div style="background-color: #fef2f2; color: #991b1b; padding: 16px; border-radius: 8px; border: 2px solid #ef4444; margin-bottom: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                            <span style="font-size: 20px;">⚠️</span>
                            <strong style="font-size: 15px;">Revisa els següents errors:</strong>
                        </div>
                        <ul style="list-style: disc; margin-left: 40px; font-size: 14px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('profes.store') }}">
                    @csrf

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Nom</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control"/>
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Cognoms</label>
                            <input type="text" name="apellidos" value="{{ old('apellidos') }}" class="form-control"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">NIF / CIF</label>
                        <input type="text" name="nif_cif" value="{{ old('nif_cif') }}" placeholder="Ex: 12345678A o A12345678" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"/>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Telèfon</label>
                            <input type="tel" name="telefono" value="{{ old('telefono') }}" class="form-control"/>
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Data de naixement</label>
                            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Adreça</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" class="form-control"/>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Especialitat</label>
                            <select name="especialidad" class="form-control bg-white">
                                <option value="Sistemes">Sistemes</option>
                                <option value="Desenvolupament">Desenvolupament</option>
                                <option value="Xarxes">Xarxes</option>
                                <option value="IA">IA</option>
                                <option value="Ciberseguretat">Ciberseguretat</option>
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Experiència (anys)</label>
                            <input type="number" name="anyos_experiencia" value="{{ old('anyos_experiencia') }}" class="form-control"/>
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Sou (€)</label>
                            <input type="number" step="0.01" name="sueldo" min="500" value="{{ old('sueldo') }}" class="form-control"/>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #374151;">Categoria professional</label>
                        <input type="text" name="categoria_profesional" value="{{ old('categoria_profesional') }}" class="form-control"/>
                    </div>

                    <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
		            <a href="{{ url('dashboard') }}" class="btn btn-outline-secondary">
		                Tornar al Dashboard
		            </a>

                        <button type="submit" class="btn btn-primary">
                            GUARDAR
                        </button>
                        <a href="{{ route('profes.index') }}" class="btn btn-outline-secondary">
                            TORNA
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
