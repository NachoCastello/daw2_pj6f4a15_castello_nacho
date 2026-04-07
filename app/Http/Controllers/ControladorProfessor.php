<?php

namespace App\Http\Controllers;

use App\Models\Professor; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ControladorProfessor extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');
        
        $dades_professors = Professor::all();
        return view('llista', compact('dades_professors'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');
        return view('crea');
    }

	public function store(Request $request)
	{
	    if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

	    $validatedData = $request->validate([
	        'nombre'            => 'required|string|max:100',
	        'apellidos'         => 'required|string|max:100',
	        'nif_cif'           => 'required|string|min:9|max:12|unique:principal,nif_cif',
	        'email'             => 'required|email|unique:principal,email',
	        'telefono'          => 'nullable|digits:9',
	        'direccion'         => 'required|string|max:255',
	        'fecha_nacimiento'  => 'required|date|before:today',
	        'especialidad'      => 'required|in:Sistemes,Desenvolupament,Xarxes,IA,Ciberseguretat',
	        'anyos_experiencia' => 'required|integer|min:0',
	        'sueldo'            => 'required|numeric|min:500',
	        'categoria_profesional' => 'required|string|max:50',
	    ], [
	        'nif_cif.required' => 'El NIF/CIF és obligatori.',
	        'nif_cif.unique'   => 'Aquest NIF/CIF ja està registrat.',
	    ]);

	    Professor::create($validatedData);

	    return redirect()->route('profes.index')->with('success', 'Professor creat correctament.');
	}

    public function edit($id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');
        
        $dades_professors = Professor::findOrFail($id);
        return view('actualitza', compact('dades_professors'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $dades_professors = Professor::findOrFail($id);
        $dades_professors->update($request->all());

        return redirect()->route('profes.index')->with('success', 'Dades actualitzades correctament.');
    }

    /**
     * GESTOR: Veure fitxa completa (mostra.blade.php)
     */
    public function show($id)
    {
        $dades_professors = Professor::findOrFail($id);
        return view('mostra', compact('dades_professors'));
    }

    /**
     * GESTOR: Eliminar registre
     */
    public function destroy($id)
    {
        if (Auth::user()->role !== 'gestor') return redirect()->route('dashboard-basic');

        $dades_professors = Professor::findOrFail($id);
        $dades_professors->delete();

        return redirect()->route('profes.index')->with('success', 'Professor eliminat.');
    }

    // --- MÈTODES PER AL CONSULTOR (BÀSIC) ---

    public function index_basic()
    {
        // Només ID, Nom i Cognoms per al Consultor
        $dades_professors = Professor::select('id', 'nombre', 'apellidos')->get();
        return view('llista-basica', compact('dades_professors'));
    }

    public function show_basic($id)
    {
        $dades_professors = Professor::findOrFail($id);
        return view('mostra-basica', compact('dades_professors'));
    }

	/** PDF de una única entrada (Ficha individual) */
	public function pdfDetall($id)
	{
	    $dades_professors = \App\Models\Professor::findOrFail($id);
	    $pdf = Pdf::loadView('pdf.detall', compact('dades_professors'));
	    return $pdf->download('detall-professor-'.$id.'.pdf');
	}
}
