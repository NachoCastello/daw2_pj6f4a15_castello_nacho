@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vista Profesor:') }}
    </h2>
@endsection


@section('content')
<h1>Dades del professor (Vista Bàsica)</h1>
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
	<div class="p-6 bg-white border-b border-gray-200">
		<a href="{{ url('dashboard-basic') }}">Torna al dashboard</a> 
	</div> 

<div style="margin-top: 20px;">
    <a href="{{ route('profes.pdf.detall', $dades_professors->id) }}" 
       class="btn btn-danger" 
       style="font-weight: bold; padding: 10px 24px; border-radius: 6px; text-decoration: none; display: inline-block; background-color: #dc3545; color: white; border: none;">
        GENERAR PDF DE LA FITXA
    </a>
</div>

</div>
@endsection
