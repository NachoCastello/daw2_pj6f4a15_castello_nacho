<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. VALIDACIÓ: Hem pujat el max a 20 perquè 'consultor' té 9 lletres
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:20'], // Canviat de 5 a 20
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. CREACIÓ DE L'USUARI
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role, // Es guardarà 'gestor' o 'consultor'
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

	return redirect()->back()->with('status', 'usuari-creat');

    }
}
