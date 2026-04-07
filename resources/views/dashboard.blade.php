<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url('profes') }}">Professors: visualitza, actualitza i esborra registres</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ url('profes/create') }}">Professors: crea un nou registre</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('register') }}">Crea un nou usuari de l'aplicació</a><br> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
