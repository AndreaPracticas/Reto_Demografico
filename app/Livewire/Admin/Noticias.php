<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\News;
use App\Models\Field;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Noticias extends Component
{
    use WithFileUploads;

    public $confirmingDelete = false;
    public $deleteId = null;

    public $showModal = false;
    public $fields;
    public $field_id;
    public $title;
    public $description;
    public $image;
    public $link;
    public $noticia_id;

    public $trashedIds = [];

    public $searchTitle = '';
    public $searchDescription = '';
    public $searchField = '';
    public $searchDate = '';

    public function mount()
    {
        $this->fields = Field::all();
        $this->refreshTrashedIds();
    }

    public function create()
    {
        $this->reset(['field_id','title','description','image','link','noticia_id']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['field_id','title','description','image','link','noticia_id']);
    }

    public function edit($id)
    {
        $noticia = News::findOrFail($id);
        $this->field_id    = $noticia->field_id;
        $this->title       = $noticia->title;
        $this->description = $noticia->description;
        $this->link        = $noticia->link; 
        $this->noticia_id  = $noticia->id;
        $this->image       = null;
        $this->showModal   = true;
    }

    public function save()
    {
        $this->validate([
            'field_id'    => 'required|exists:fields,id',
            'title'       => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'image'       => $this->noticia_id ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'link'        => 'nullable|url',
        ]);

        $filename = null;
        if ($this->image) {
            $filename = $this->image->store('news', 'public');
        }

        $currentImage = $this->noticia_id ? optional(News::find($this->noticia_id))->image : null;
        $currentLink  = $this->noticia_id ? optional(News::find($this->noticia_id))->link  : null;

        News::updateOrCreate(
            ['id' => $this->noticia_id],
            [
                'user_id'     => Auth::id(),
                'field_id'    => $this->field_id,
                'title'       => $this->title,
                'description' => $this->description,
                'image'       => $filename ?? $currentImage,
                'link'        => $this->link ?? $currentLink,
            ]
        );

        $this->reset(['field_id','title','description','image','link','noticia_id']);
        $this->showModal = false;
    }

    private function refreshTrashedIds()
    {
        $this->trashedIds = News::onlyTrashed()->pluck('id')->toArray();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        News::findOrFail($this->deleteId)->delete();
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
        News::withTrashed()->findOrFail($id)->restore();
        $this->refreshTrashedIds();
    }

    public function render()
    {
        $query = News::withTrashed()->latest();

        if ($this->searchTitle) {
            $query->where('description', 'like', '%' . $this->searchTitle . '%');
        }

        if ($this->searchDescription) {
            $query->where('description', 'like', '%' . $this->searchDescription . '%');
        }

        if ($this->searchField) {
            $query->where('field_id', $this->searchField);
        }

        if ($this->searchDate) {
            $query->whereDate('created_at', $this->searchDate);
        }

        $noticias = $query->get();

         /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.noticias', [
            'noticias' => $noticias,
            'trashedIds' => News::onlyTrashed()->pluck('id')->toArray(),
        ]);

        return $view->layout('layouts.admin');
    }
}
