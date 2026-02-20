<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $scope = $request->input('scope', ''); // 'regionales', 'nacionales', 'europeas'
        $topic = $request->query('topic', '');       // Tema seleccionado

        $topics = [
            'Agenda 2030',
            'Agua y Energía',
            'Cultura',
            'Economía y Empleo',
            'Planificación',
            'Recuperación',
            'Transición ecológica'
        ];

        $query = File::query()->with(['theme', 'scopeRelation']);

        // Filtrar por scope (ignora mayusculas/minúsculas)
        if ($scope) {
            $query->whereHas('scopeRelation', function ($q) use ($scope) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($scope) . '%']);
            });
        }

        // Filtrar por topic (ignora mayusculas/minúsculas)
        if ($topic) {
            $query->whereHas('theme', function ($q) use ($topic) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($topic) . '%']);
            });
        }

        $documents = $query->get();

        return view('ayudaSubvenciones', compact('scope', 'topic', 'topics', 'documents'));
    }
}
