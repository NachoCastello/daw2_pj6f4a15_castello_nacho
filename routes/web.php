<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorProfessor;
use App\Http\Controllers\ControladorUsuari;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () { return view('inici'); });
Route::get('/info', function () { return view('info'); });

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'gestor') {
            return view('dashboard');
        }
        return redirect()->route('dashboard-basic');
    })->name('dashboard');

    Route::get('/dashboard-basic', function () { 
        return view('dashboard-basic'); 
    })->name('dashboard-basic');

    Route::group([], function () {
        Route::resource('profes', ControladorProfessor::class);
        Route::resource('usuaris', ControladorUsuari::class);
    });

    Route::get('profes-basic', [ControladorProfessor::class, 'index_basic'])->name('profes.index_basic');
    Route::get('profes-basic/{id}', [ControladorProfessor::class, 'show_basic'])->name('profes.show_basic');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/pdf', [ControladorUsuari::class, 'pdfLlista'])->name('usuaris.pdf.llista');
    Route::get('/pdf/{id}', [ControladorProfessor::class, 'pdfDetall'])->name('profes.pdf.detall');

});

require __DIR__.'/auth.php';
