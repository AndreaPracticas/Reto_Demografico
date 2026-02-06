<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/ayudasysubvenciones', function () {return view('ayudaSubvenciones');
})->name('ayudasysubvenciones'); //lleva desde el nav a ayudas y subvenciones
Route::get('/ayudasysubvenciones/filter', [DocumentController::class, 'filter']); //actualiza el partial
