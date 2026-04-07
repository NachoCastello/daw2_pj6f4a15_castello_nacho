<x-guest-layout>

	@if (session('status') === 'usuari-creat')
	    <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid #10b981; font-weight: bold; text-align: center;">
	        L'usuari s'ha creat correctament!
	    </div>
	@endif

	@if ($errors->any())
	    <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid #ef4444;">
	        <ul class="list-disc pl-5">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Contrasenya')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Contrasenya')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

	<div class="mt-4">
	    <label for="role" class="block font-medium text-sm text-gray-700">Tipus d'Usuari (Rol)</label>
	    <select name="role" id="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500">
	        <option value="gestor">Gestor (Accés total)</option>
	        <option value="consultor">Consultor (Accés bàsic)</option>
	    </select>
	</div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Registra') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-4 p-6 bg-white border-t border-gray-200 text-center">
        <a href="{{ url('dashboard') }}" class="text-sm text-blue-600 hover:underline">Torna al dashboard</a>
    </div>
</x-guest-layout>
