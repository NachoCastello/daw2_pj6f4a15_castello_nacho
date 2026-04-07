@extends('disseny')
@section('content')
<h1>Llista de professors</h1>
<div class="mt-5">
  <table class="table">
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
            <a href="{{ route('profes.edit', $profe->id)}}" class="btn btn-primary btn-sm">Edita</a>
            <form action="{{ route('profes.destroy', $profe->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                Esborra
              </button>
            </form>
            <a href="{{ route('profes.show', $profe->id)}}" class="btn btn-info btn-sm">Mostra</a>  
          </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
    @if(Auth::user()->role === 'gestor')
        {{-- Enlace para el Gestor --}}
        <a href="{{ url('dashboard') }}" 
           style="color: #6b7280; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db;">
            Torna al dashboard1
        </a>
    @else
        <a href="{{ url('dashboard-basic') }}" 
           style="color: #6b7280; padding: 10px 24px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px; border: 1px solid #d1d5db;">
            Torna al dashboard2
        </a>
    @endif
</div>
@endsection
