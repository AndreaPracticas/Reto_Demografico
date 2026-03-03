<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\Noticias;
use App\Livewire\Admin\Inicio;

Route::get('/', function () {
    return view('inicio');
});

Route::match(['get', 'post'], '/ayudasysubvenciones', [DocumentController::class, 'index'])
    ->name('ayudasysubvenciones');

Route::match(['get', 'post'], '/actualidad', [NewsController::class, 'index'])
    ->name('actualidad');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function () {
    // reemplaza la definición anterior
    Route::get('/', \App\Livewire\Admin\Inicio::class)
         ->name('admin.inicio');

    Route::get('/noticias', \App\Livewire\Admin\Noticias::class)
         ->name('admin.noticias');
});