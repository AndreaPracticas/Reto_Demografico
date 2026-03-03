<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\News;
use App\Models\Field;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Noticias extends Component
{
    use WithFileUploads;

    public $noticias;
    public $fields;
    public $field_id;
    public $title;
    public $description;
    public $image;
    public $noticia_id;

    public function mount()
    {
        $this->loadNoticias();
        $this->fields = Field::all(); // todos los campos disponibles
    }

    public function loadNoticias()
    {
        $this->noticias = News::latest()->get();
    }

    public function create()
    {
        $this->reset(['field_id','title','description','image','noticia_id']);
    }

    public function edit($id)
    {
        $noticia = News::findOrFail($id);
        $this->field_id = $noticia->field_id;
        $this->title = $noticia->title;
        $this->description = $noticia->description;
        $this->noticia_id = $noticia->id;
        $this->image = null; // no sobreescribimos la imagen hasta nueva carga
    }

    public function save()
    {
        $this->validate([
            'field_id' => 'required|exists:fields,id',
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'image' => $this->noticia_id ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $filename = null;
        if ($this->image) {
            $filename = $this->image->store('news', 'public');
        }

        $noticia = News::updateOrCreate(
            ['id' => $this->noticia_id],
            [
                'user_id' => Auth::id(),
                'field_id' => $this->field_id,
                'title' => $this->title,
                'description' => $this->description,
                'image' => $filename ?? ($this->noticia_id ? News::find($this->noticia_id)->image : null)
            ]
        );

        $this->reset(['field_id','title','description','image','noticia_id']);
        $this->loadNoticias();
    }

    public function delete($id)
    {
        $noticia = News::findOrFail($id);
        if ($noticia->image) {
            Storage::disk('public')->delete($noticia->image);
        }
        $noticia->delete();
        $this->loadNoticias();
    }

    public function render()
    {
         /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.noticias');

        return $view->layout('layouts.admin');
    }
}
