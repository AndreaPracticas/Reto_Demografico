<?php

namespace App\Livewire\Admin;

use App\Models\File;
use Livewire\Component;
use App\Models\User;
use App\Models\News;

class Inicio extends Component
{
    public function render()
    {
        $resumen = [
            'usuarios' => User::count(),
            'noticias' => News::count(),
            'archivos' => File::count(),
        ];

        // Recogemos los últimos registros con fecha real
        $acciones = collect();

        User::latest()->take(5)->get()->each(function ($u) use (&$acciones) {
            $acciones->push([
                'texto' => "Usuario \"{$u->name}\" registrado",
                'fecha' => $u->created_at,
            ]);
        });

        News::withTrashed()->latest()->take(5)->get()->each(function ($n) use (&$acciones) {
            if ($n->trashed()) {
                $acciones->push([
                    'texto' => "Noticia \"{$n->title}\" eliminada",
                    'fecha' => $n->deleted_at,
                ]);
            } else {
                $acciones->push([
                    'texto' => "Noticia \"{$n->title}\" publicada",
                    'fecha' => $n->created_at,
                ]);
            }
        });

        File::latest()->take(5)->get()->each(function ($a) use (&$acciones) {
            $acciones->push([
                'texto' => "Archivo \"{$a->name}\" subido",
                'fecha' => $a->created_at,
            ]);
        });

        $ultimasAcciones = $acciones
            ->sortByDesc('fecha')
            ->take(5)
            ->pluck('texto');

         /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.inicio', [
            'resumen' => $resumen,
            'ultimasAcciones' => $ultimasAcciones,
        ]);

        return $view->layout('layouts.admin');
    }
}
