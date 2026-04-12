<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class ControladorUsuari extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $usuaris = User::all();
        return view('usuaris_index', compact('usuaris')); 
    }

    public function create()
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');
        return view('usuaris_crea');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:gestor,consultor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('usuaris.index')->with('success', 'Usuari creat correctament.');
    }

    public function show($id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');
        $usuari = User::findOrFail($id);
        return view('usuaris_mostra', compact('usuari'));
    }

    public function edit($id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');
        $usuari = User::findOrFail($id);
        return view('usuaris_actualitza', compact('usuari'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $usuari = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$usuari->id,
            'role' => 'required|in:gestor,consultor',
            'password' => 'nullable|string|min:8',
        ]);

        $usuari->name = $request->name;
        $usuari->email = $request->email;
        $usuari->role = $request->role;
        if ($request->filled('password')) {
            $usuari->password = Hash::make($request->password);
        }
        $usuari->save();

        return redirect()->route('usuaris.index')->with('success', 'Usuari actualitzat correctament.');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $user = User::findOrFail($id);
        
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'No pots esborrar el teu propi usuari!');
        }

        $user->delete();
        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament.');
    }

    public function pdfLlista()
    {
        $usuarios = User::all();
        $pdf = Pdf::loadView('pdf.usuaris', compact('usuarios'));
        return $pdf->download('llistat-usuaris-app.pdf');
    }
}
