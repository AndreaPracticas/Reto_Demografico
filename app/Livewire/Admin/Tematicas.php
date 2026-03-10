<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Theme;

class Tematicas extends Component
{
    public $showModal = false;
    public $confirmingDelete = false;
    public $deleteId = null;

    public $theme_id;
    public $name;
    public $icon = '';

    public $trashedIds = [];

    public $searchName = '';

    public function mount()
    {
        $this->refreshTrashedIds();
    }

    private function refreshTrashedIds()
    {
        $this->trashedIds = Theme::onlyTrashed()->pluck('id')->toArray();
    }

    public function create()
    {
        $this->reset(['theme_id', 'name', 'icon']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['theme_id', 'name', 'icon']);
    }

    public function edit($id)
    {
        $theme = Theme::withTrashed()->findOrFail($id);
        $this->theme_id = $theme->id;
        $this->name     = $theme->name;
         $this->icon     = $theme->icon;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|min:2|unique:themes,name,' . $this->theme_id,
            'icon' => 'required|string',
        ]);

        Theme::updateOrCreate(
            ['id' => $this->theme_id],
            [
                'name' => $this->name,
                'icon' => $this->icon,
            ]
        );

        $this->reset(['theme_id', 'name', 'icon']);
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
        Theme::findOrFail($this->deleteId)->delete();
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
        Theme::withTrashed()->findOrFail($id)->restore();
        $this->refreshTrashedIds();
    }

    public function render()
    {
        $themes = Theme::withTrashed()
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->latest()
            ->get();

         /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.tematicas', [
            'themes' => $themes,
        ]);

        return $view->layout('layouts.admin');
        }
}