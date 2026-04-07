<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ControladorUsuari extends Controller
{
    public function index()
    {
        // Solo el gestor entra aquí
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $usuaris = User::all();
        return view('usuaris_index', compact('usuaris')); 
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $user = User::findOrFail($id);
        
        // Impedir que se borre a sí mismo
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'No pots esborrar el teu propi usuari!');
        }

        $user->delete();
        // Mensaje de éxito al borrar
        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament.');
    }

    public function pdfLlista()
    {
        // Traemos todos los usuarios de la tabla 'users'
        $usuarios = User::all();
        
        // Cargamos la vista que diseñaremos para el PDF
        $pdf = Pdf::loadView('pdf.usuaris', compact('usuarios'));
        
        // Descarga el archivo
        return $pdf->download('llistat-usuaris-app.pdf');
    }
}
