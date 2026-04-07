@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Modificar Profesor') }}
    </h2>
@endsection


@section('content')
<div class="card mt-5">
    <div class="card-header">
        Actualització de dades del professor
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('profes.update', $dades_professors->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">           
                <label for="nombre">Nom</label>
                <input type="text" class="form-control" name="nombre" value="{{ $dades_professors->nombre }}" />
            </div>
            <div class="form-group">           
                <label for="apellidos">Cognoms</label>
                <input type="text" class="form-control" name="apellidos" value="{{ $dades_professors->apellidos }}"/>
            </div>

	    <div class="form-group mb-3">
	        <label for="nif_cif">NIF / CIF</label>
	        <input type="text" class="form-control" name="nif_cif" value="{{ old('nif_cif', $dades_professors->nif_cif) }}">
	    </div>

            <div class="form-group">           
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $dades_professors->email }}"/>
            </div>
            <div class="form-group">
                <label for="telefono">Telèfon</label>
                <input type="tel" class="form-control" name="telefono" value="{{ $dades_professors->telefono }}"/>
            </div>
            <div class="form-group">           
                <label for="direccion">Adreça</label>
                <input type="text" class="form-control" name="direccion" value="{{ $dades_professors->direccion }}"/>
            </div>        
            <div class="form-group">           
                <label for="fecha_nacimiento">Data de naixement</label>
                <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $dades_professors->fecha_nacimiento }}"/>
            </div>
            <div class="form-group">           
                <label for="especialidad">Especialitat</label>
                <select name="especialidad" class="form-control">
                    <option value="Sistemes" {{ $dades_professors->especialidad == "Sistemes" ? 'selected' : ''}}>Sistemes</option>
                    <option value="Desenvolupament" {{ $dades_professors->especialidad == "Desenvolupament" ? 'selected' : ''}}>Desenvolupament</option>
                    <option value="Xarxes" {{ $dades_professors->especialidad == "Xarxes" ? 'selected' : ''}}>Xarxes</option>
                    <option value="IA" {{ $dades_professors->especialidad == "IA" ? 'selected' : ''}}>IA</option>
                    <option value="Ciberseguretat" {{ $dades_professors->especialidad == "Ciberseguretat" ? 'selected' : ''}}>Ciberseguretat</option>
                </select>
            </div>
            <div class="form-group">           
                <label for="anyos_experiencia">Anys d'experiència</label>
                <input type="number" class="form-control" name="anyos_experiencia" value="{{ $dades_professors->anyos_experiencia }}"/>
            </div>
            <div class="form-group">           
                <label for="categoria_profesional">Categoria professional</label>
                <input type="text" class="form-control" name="categoria_profesional" value="{{ $dades_professors->categoria_profesional }}"/>
            </div>
            <div class="form-group">           
                <label for="sueldo">Sou</label>
                <input type="number" step="0.01" class="form-control" name="sueldo" min="500" value="{{ $dades_professors->sueldo }}"/>            
            </div>        
            <button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
	<div style="margin-top: 30px;">
	    <a href="{{ route('profes.index') }}" 
	       style="display: inline-block; padding: 10px 20px; background-color: #ffffff; 
	              border: 1px solid #d1d5db; border-radius: 6px; text-decoration: none; 
	              color: #000000; font-weight: bold;">
	        Llista de professors
	    </a>
	</div>
    </div>
</div>
@endsection
