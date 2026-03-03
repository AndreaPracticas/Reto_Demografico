<?php

namespace App\Livewire\Admin;

use App\Models\File;
use Livewire\Component;
use App\Models\User;
use App\Models\News;

class Inicio extends Component
{

    // Variables públicas que la vista mostrará
    public $resumen = [];
    public $ultimasAcciones = [];

    public function mount()
    {
        // Cargar conteos reales
        $this->resumen = [
            'usuarios' => User::count(),
            'noticias' => News::count(),
            'archivos' => File::count(),
        ];

        // Cargar últimas acciones (ejemplo: últimos 5 registros)
        $ultimosUsuarios = User::latest()->take(5)->get();
        $ultimasNoticias = News::latest()->take(5)->get();
        $ultimosArchivos = File::latest()->take(5)->get();

        // Combinar en un array para la vista
        $acciones = [];

        foreach ($ultimosUsuarios as $u) {
            $acciones[] = "Usuario {$u->name} registrado";
        }

        foreach ($ultimasNoticias as $n) {
            $acciones[] = "Noticia \"{$n->title}\" publicada";
        }

        foreach ($ultimosArchivos as $a) {
            $acciones[] = "Archivo \"{$a->name}\" subido";
        }

        // Ordenar por fecha de creación descendente (más reciente primero)
        usort($acciones, function($a, $b) {
            return 0; // Simple placeholder, puedes usar created_at si quieres exacto
        });

        $this->ultimasAcciones = array_slice($acciones, 0, 5);
    }

    public function render()
    {
         /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.inicio');

        return $view->layout('layouts.admin');
    }
}
