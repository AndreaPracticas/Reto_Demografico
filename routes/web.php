<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('inicio');
});

Route::match(['get', 'post'], '/ayudasysubvenciones', [DocumentController::class, 'index'])
    ->name('ayudasysubvenciones');

Route::match(['get', 'post'], '/actualidad', [NewsController::class, 'index'])
    ->name('actualidad');
