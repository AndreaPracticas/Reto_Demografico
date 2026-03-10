<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;
use App\Models\Theme;
use App\Models\Subtheme;
use App\Models\Scope;
use Illuminate\Support\Facades\Auth;

class Ayudas extends Component
{
    use WithFileUploads;

    // Modal
    public $showModal = false;
    public $confirmingDelete = false;
    public $deleteId = null;
    public $refreshKey = 0;

    // Formulario
    public $file_id;
    public $name;
    public $pdf;
    public $theme_id;
    public $subtheme_id;
    public $scope_id;
    public $reopening_date;
    public $closing_date;
    public $reopening_time;
    public $closing_time;
    public $searchStatus = '';

    // Opciones selectores
    public $themes;
    public $subthemes;
    public $scopes;

    // Buscadores
    public $searchName = '';
    public $searchTheme = '';
    public $searchSubtheme = '';
    public $searchScope = '';
    public $searchDateFrom = '';
    public $searchDateTo = '';

    public function mount()
    {
        $this->themes    = Theme::all();
        $this->subthemes = Subtheme::all();
        $this->scopes    = Scope::all();
    }

    public function create()
    {
        $this->reset(['file_id','name','pdf','theme_id','subtheme_id','scope_id']);
        $this->reopening_date = now()->format('Y-m-d');
        $this->reopening_time = '00:00';
        $this->closing_date   = '';
        $this->closing_time   = '23:59';
        $this->showModal      = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['file_id','name','pdf','theme_id','subtheme_id','scope_id','reopening_date','closing_date']);
    }

    public function edit($id)
    {
        $file = File::withTrashed()->findOrFail($id);
        $this->file_id        = $file->id;
        $this->name           = $file->name;
        $this->theme_id       = $file->theme_id;
        $this->subtheme_id    = $file->subtheme_id;
        $this->scope_id       = $file->scope_id;
        $this->reopening_date = \Carbon\Carbon::parse($file->reopening_date)->format('Y-m-d');
        $this->reopening_time = \Carbon\Carbon::parse($file->reopening_date)->format('H:i');
        $this->closing_date   = \Carbon\Carbon::parse($file->closing_date)->format('Y-m-d');
        $this->closing_time   = \Carbon\Carbon::parse($file->closing_date)->format('H:i');
        $this->pdf            = null;
        $this->showModal      = true;
    }

    public function save()
    {
        $this->validate([
            'name'           => 'required|string|min:3',
            'theme_id'       => 'required|exists:themes,id',
            'subtheme_id'    => 'required|exists:subthemes,id',
            'scope_id'       => 'required|exists:scopes,id',
            'reopening_date' => 'required|date',
            'closing_date'   => 'required|date|after_or_equal:reopening_date',
            'reopening_time' => 'required',
            'closing_time'   => 'required',
            'pdf'            => $this->file_id ? 'nullable|file|mimes:pdf|max:10240' : 'required|file|mimes:pdf|max:10240',
        ]);

        $reopening = $this->reopening_date . ' ' . $this->reopening_time . ':00';
        $closing   = $this->closing_date   . ' ' . $this->closing_time   . ':00';

        $pdfPath = null;
        if ($this->pdf) {
            $pdfPath = $this->pdf->store('ayudas', 'public');
        }

        $currentPdf = $this->file_id ? optional(File::find($this->file_id))->pdf_path : null;

        File::updateOrCreate(
            ['id' => $this->file_id],
            [
                'user_id'        => Auth::id(),
                'name'           => $this->name,
                'theme_id'       => $this->theme_id,
                'subtheme_id'    => $this->subtheme_id,
                'scope_id'       => $this->scope_id,
                'reopening_date' => $reopening,
                'closing_date'   => $closing,
                'pdf_path'       => $pdfPath ?? $currentPdf,
            ]
        );

        $this->reset(['file_id','name','pdf','theme_id','subtheme_id','scope_id','reopening_date','closing_date','reopening_time','closing_time']);
        $this->showModal = false;
        $this->refreshKey++;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        File::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->deleteId = null;
        $this->refreshKey++;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }

    public function restore($id)
    {
        File::withTrashed()->findOrFail($id)->restore();
        $this->refreshKey++;
    }

    public function render()
    {
        $query = File::withTrashed()->with(['theme','subtheme','scopeRelation'])->latest();

        if ($this->searchName) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        }

        if ($this->searchTheme) {
            $query->where('theme_id', $this->searchTheme);
        }

        if ($this->searchSubtheme) {
            $query->where('subtheme_id', $this->searchSubtheme);
        }

        if ($this->searchScope) {
            $query->where('scope_id', $this->searchScope);
        }

        // if ($this->searchDateFrom) {
        //     $query->where('reopening_date', '>=', $this->searchDateFrom);
        // }
        if ($this->searchStatus === 'abierto') {
            $query->where('reopening_date', '<=', now())
                ->where('closing_date', '>=', now());
        }

        if ($this->searchStatus === 'cerrado') {
            $query->where(function($q) {
                $q->where('reopening_date', '>', now())
                ->orWhere('closing_date', '<', now());
            });
        }

        if ($this->searchDateTo) {
            $query->where('closing_date', '<=', $this->searchDateTo);
        }

        $files = $query->get();

        /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.ayudas', [
            'files'      => $files,
            'trashedIds' => File::onlyTrashed()->pluck('id')->toArray(),
        ]);

        return $view->layout('layouts.admin');
    }
}

 