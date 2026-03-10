<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Subtheme;
use App\Models\Theme;

class Subtematicas extends Component
{
    public $showModal = false;
    public $confirmingDelete = false;
    public $deleteId = null;

    public $subtheme_id;
    public $name;
    public $theme_id;

    public $trashedIds = [];
    public $themes;

    public $searchName = '';
    public $searchTheme = '';

    public function mount()
    {
        $this->themes = Theme::all();
        $this->refreshTrashedIds();
    }

    private function refreshTrashedIds()
    {
        $this->trashedIds = Subtheme::onlyTrashed()->pluck('id')->toArray();
    }

    public function create()
    {
        $this->reset(['subtheme_id', 'name', 'theme_id']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['subtheme_id', 'name', 'theme_id']);
    }

    public function edit($id)
    {
        $subtheme = Subtheme::withTrashed()->findOrFail($id);
        $this->subtheme_id = $subtheme->id;
        $this->name        = $subtheme->name;
        $this->theme_id    = $subtheme->theme_id;
        $this->showModal   = true;
    }

    public function save()
    {
        $this->validate([
            'name'     => 'required|string|min:2',
            'theme_id' => 'required|exists:themes,id',
        ]);

        Subtheme::updateOrCreate(
            ['id' => $this->subtheme_id],
            [
                'name'     => $this->name,
                'theme_id' => $this->theme_id,
            ]
        );

        $this->reset(['subtheme_id', 'name', 'theme_id']);
        $this->showModal = false;
        $this->refreshTrashedIds();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Subtheme::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->deleteId = null;
        $this->refreshTrashedIds();
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }

    public function restore($id)
    {
        Subtheme::withTrashed()->findOrFail($id)->restore();
        $this->refreshTrashedIds();
    }

    public function render()
    {
        $subthemes = Subtheme::withTrashed()
            ->with('theme')
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->when($this->searchTheme, fn($q) => $q->where('theme_id', $this->searchTheme))
            ->latest()
            ->get();

        /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.subtematicas', [
            'subthemes' => $subthemes,
        ]);

        return $view->layout('layouts.admin');
    }
}