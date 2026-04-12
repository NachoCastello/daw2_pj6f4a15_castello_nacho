<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestió d\'Usuaris') }}
            </h2>
            <a href="{{ route('usuaris.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" style="background-color: #2563eb; text-decoration: none;">
                Afegeix Usuari
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; border: 1px solid #10b981; margin-bottom: 20px; font-weight: bold;">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div style="background-color: #fee2e2; color: #991b1b; padding: 12px; border-radius: 6px; border: 1px solid #ef4444; margin-bottom: 20px; font-weight: bold;">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="overflow-x-auto border border-gray-100 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Nom</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Rol</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Accions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($usuaris as $usuari)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-500">#{{ $usuari->id }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900">{{ $usuari->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $usuari->email }}</td>
                                <td class="px-6 py-4">
                                    <span style="background-color: {{ $usuari->role == 'gestor' ? '#e0e7ff' : '#f3f4f6' }}; color: {{ $usuari->role == 'gestor' ? '#4338ca' : '#374151' }}; padding: 4px 10px; border-radius: 99px; font-size: 10px; font-weight: bold; text-transform: uppercase;">
                                        {{ $usuari->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2" style="display: flex; gap: 8px; justify-content: center;">
                                        @if($usuari->id !== Auth::id())
                                            <form action="{{ route('usuaris.destroy', $usuari->id) }}" method="POST" onsubmit="return confirm('Segur?')" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #ef4444; color: white; padding: 6px 15px; border-radius: 4px; font-size: 11px; font-weight: bold; cursor: pointer; border: none;">
                                                    ELIMINAR
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-gray-400 italic block mt-1" style="font-size: 12px;">Ets tu</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
		<a href="{{ route('usuaris.pdf.llista') }}" 
               class="btn btn-danger" 
       style="font-weight: bold; padding: 10px 24px; border-radius: 6px; text-decoration: none; display: inline-block; background-color: #dc3545; color: white; border: none;">

		    GENERAR PDF USUARIS
		</a>
            </div>
        </div>
    </div>
</x-app-layout>
