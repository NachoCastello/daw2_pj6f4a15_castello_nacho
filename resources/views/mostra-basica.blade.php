@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vista Profesor:') }}
    </h2>
@endsection


@section('content')
<div class="mt-5">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr class="table-primary">
				<th scope="col">CAMP</th>
				<th scope="col">VALOR</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>id</td>
				<td>{{$dades_professors->id}}</td>
			</tr>
			<tr>
				<td>Nom</td>
				<td>{{$dades_professors->nombre}}</td>
			</tr>
			<tr>
				<td>Cognoms</td>
				<td>{{$dades_professors->apellidos}}</td>
			</tr>
			<tr>
				<td>Categoria professional</td>
				<td>{{$dades_professors->categoria_profesional}}</td>
			</tr>
			<tr>
				<td>Especialitat</td>
				<td>{{$dades_professors->especialidad}}</td>
			</tr> 
		</tbody> 
	</table>

		<div style="padding: 20px 32px; display: flex; align-items: center; gap: 12px; border-top: 1px solid #e5e7eb; background-color: #f9fafb;">
		    
		    <a href="{{ url('dashboard-basic') }}" 
		       style="color: #6b7280; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db; margin-right: auto;">
		        Torna al dashboard
		    </a>

		    @if(Auth::user()->role === 'gestor')
		        <a href="{{ route('profes.edit', $dades_professors->id) }}" 
		           style="background-color: #4f46e5; color: white; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px;">
		            MODIFICAR
		        </a>
		    @endif

		    <a href="{{ route('profes.index_basic') }}" 
		       style="color: #374151; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db; background-color: white;">
		        TORNAR
		    </a>

		</div>

</div>
@endsection
