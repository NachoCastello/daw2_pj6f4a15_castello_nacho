<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Obtenim l'usuari que s'acaba de loguejar
        $user = Auth::user();

        // REDIRECCIÓ SEGONS ROL CORREGIDA
        if ($user->role === 'gestor') {
            // Si vols que el gestor vagi directament a la llista de profes:
            // return redirect()->route('profes.index');
            
            // O si prefereixes el dashboard general:
            return redirect()->intended(route('dashboard'));
        }

        // Si és consultor (o qualsevol altre que no sigui gestor)
        return redirect()->intended(route('dashboard-basic'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
