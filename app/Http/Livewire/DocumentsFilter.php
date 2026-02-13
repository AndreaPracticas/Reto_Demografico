<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;

class DocumentsFilter extends Component
{
    public $scope = '';   // 'regionales', 'nacionales', 'europeas'
    public $topic = '';   // tema seleccionado

    public $topics = [
        'Agenda 2030',
        'Agua y Energía',
        'Cultura',
        'Economía y Empleo',
        'Planificación',
        'Recuperación',
        'Transición ecológica'
    ];

    public $documents;

    public function setScope($scope)
    {
        $this->scope = $scope;
        $this->loadDocuments();
    }

    public function setTopic($topic)
    {
        $this->topic = $topic;
        $this->loadDocuments();
    }

    public function mount($scope = '', $topic = '')
    {
        $this->scope = $scope;
        $this->topic = $topic;
        $this->loadDocuments();
    }

    public function updatedScope($value)
    {
        $this->scope = $value;
        $this->topic = ''; // Reiniciar el topic al cambiar el scope
        $this->loadDocuments();
    }

    public function updatedTopic($value)
    {
        $this->topic = $value;
        $this->loadDocuments();
    }

    public function loadDocuments()
    {
        // Si no hay scope ni topic, no traemos ningún documento
        if (!$this->scope && !$this->topic) {
            $this->documents = collect(); // colección vacía
            return;
        }

        $query = File::query()->with(['theme', 'subtheme', 'scopeRelation']); // evita N+1

       if ($this->scope) {
            $query->whereHas('scopeRelation', fn($q) =>
                $q->whereRaw('LOWER(name) = ?', [strtolower($this->scope)])
            );
        }

        if ($this->topic) {
            $query->whereHas('theme', fn($q) =>
                $q->whereRaw('LOWER(name) = ?', [strtolower($this->topic)])
            );
        }

        $this->documents = $query->get();
    }

    public function render()
    {
        return view('livewire.documents-filter');
    }
}
