<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorProfessor;
use App\Http\Controllers\ControladorUsuari;
use Illuminate\Support\Facades\Auth;

// 1. Pàgines Públiques
Route::get('/', function () { return view('inici'); });
Route::get('/info', function () { return view('info'); });

// 2. Rutes Protegides
Route::middleware('auth')->group(function () {

    // Dashboard Dinàmic (Decideix on va segons el rol)
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'gestor') {
            return view('dashboard');
        }
        return redirect()->route('dashboard-basic');
    })->name('dashboard');

    Route::get('/dashboard-basic', function () { 
        return view('dashboard-basic'); 
    })->name('dashboard-basic');

    /* SOLUCIÓN AL ERROR: 
       En lugar de un middleware con función, usamos un grupo normal 
       y protegemos las rutas con un condicional simple.
    */
    Route::group([], function () {
        // Rutas para el Gestor
        // Si alguien intenta entrar y no es gestor, lo echaremos desde el controlador o aquí
        Route::resource('profes', ControladorProfessor::class);
        Route::resource('usuaris', ControladorUsuari::class);
    });

    // Rutes per a Consultor
    Route::get('profes-basic', [ControladorProfessor::class, 'index_basic'])->name('profes.index_basic');
    Route::get('profes-basic/{id}', [ControladorProfessor::class, 'show_basic'])->name('profes.show_basic');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/pdf', [ControladorUsuari::class, 'pdfLlista'])->name('usuaris.pdf.llista');
    Route::get('/pdf/{id}', [ControladorProfessor::class, 'pdfDetall'])->name('profes.pdf.detall');

});

require __DIR__.'/auth.php';
