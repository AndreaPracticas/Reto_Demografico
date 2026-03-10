<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;
use App\Models\Theme;

class DocumentsFilter extends Component
{
    public $scope = '';
    public $topic = '';
    public $status = '';

    protected $listeners = ['setScope'];

    public $documents;

    public function setScope($scope)
    {
        $this->scope = $scope;
        $this->loadDocuments();
    }

    public function setTopic($topic)
    {
        $this->topic = $topic;

        $openDocs = File::whereHas('scopeRelation', fn($q) =>
            $q->whereRaw('LOWER(name) = ?', [strtolower($this->scope)])
        )->whereHas('theme', fn($q) =>
            $q->whereRaw('LOWER(name) = ?', [strtolower($topic)])
        )->whereRaw('? BETWEEN reopening_date AND closing_date', [now()->format('Y-m-d H:i:s')])
        ->exists();

        $this->status = $openDocs ? 'open' : 'closed';
        $this->loadDocuments();
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->loadDocuments();
    }

    public function mount($scope = '', $topic = '')
    {
        $firstTopic = Theme::orderBy('name')->first();

        $this->scope = $scope;
        $this->topic = $topic ?: ($firstTopic->name ?? '');

        $openDocs = File::whereHas('scopeRelation', fn($q) =>
            $q->whereRaw('LOWER(name) = ?', [strtolower($this->scope)])
        )->whereHas('theme', fn($q) =>
            $q->whereRaw('LOWER(name) = ?', [strtolower($this->topic)])
        )->whereRaw('? BETWEEN reopening_date AND closing_date', [now()->format('Y-m-d H:i:s')])
        ->exists();

        $this->status = $openDocs ? 'open' : 'closed';
        $this->loadDocuments();
    }

    public function loadDocuments()
    {
        if (!$this->scope && !$this->topic) {
            $this->documents = collect();
            return;
        }

        $query = File::query()->with(['theme', 'subtheme', 'scopeRelation']);

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

        if ($this->status === 'open') {
            $query->whereRaw('? BETWEEN reopening_date AND closing_date', [now()->format('Y-m-d H:i:s')]);
        } elseif ($this->status === 'closed') {
            $query->whereRaw('? NOT BETWEEN reopening_date AND closing_date', [now()->format('Y-m-d H:i:s')]);
        }

        $this->documents = $query->get();
    }

    public function render()
    {
        return view('livewire.documents-filter', [
            'topics' => Theme::orderBy('name')->get(['name', 'icon']), // solo en render, nunca como propiedad
        ]);
    }
}