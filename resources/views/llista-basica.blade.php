@extends('disseny')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Llistat de Professors') }}
    </h2>
@endsection

@section('content')
<h1>Llista de professors (Vista Bàsica)</h1>
<div class="mt-5">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr class="table-primary">
				<td>id</td>
				<td>Nom</td>
				<td>Cognoms</td>				
				<td>Accions sobre la taula</td> 
			</tr>
		</thead>
		<tbody>
		@foreach($dades_professors as $profe)
			<tr>
				<td>{{$profe->id}}</td>
				<td>{{$profe->nombre}}</td>
				<td>{{$profe->apellidos}}</td>				
				<td class="text-left">
					<a href="{{ route('profes.show_basic', $profe->id)}}" class="btn btn-info btn-sm">MOSTRA</a>
				</td> 
			</tr>
		@endforeach
		</tbody>
	</table>
        <a href="{{ url('dashboard-basic') }}" 
           style="color: #6b7280; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db;">
            Torna al dashboard
	</a>
</div>
@endsection
