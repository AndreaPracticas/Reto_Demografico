<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/ayudasysubvenciones', [DocumentController::class, 'index'])
    ->name('ayudasysubvenciones');
