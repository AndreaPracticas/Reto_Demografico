<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Usuarios extends Component
{
    public $showModal = false;
    public $confirmingDelete = false;
    public $confirmingForceDelete = false;
    public $deleteId = null;

    public $user_id;
    public $name;
    public $email;
    public $password;
    public $is_admin = false;

    public $searchName = '';

    public function mount()
    {
        
    }

    public function create()
    {
        $this->reset(['user_id', 'name', 'email', 'password', 'is_admin']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['user_id', 'name', 'email', 'password', 'is_admin']);
    }

    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $this->user_id  = $user->id;
        $this->name     = $user->name;
        $this->email    = $user->email;
        $this->is_admin = $user->is_admin;
        $this->password = '';
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name'     => 'required|string|min:2',
            'email'    => 'required|email|unique:users,email,' . $this->user_id,
            'password' => $this->user_id ? 'nullable|min:6' : 'required|min:6',
            'is_admin' => 'boolean',
        ]);

        $data = [
            'name'     => $this->name,
            'email'    => $this->email,
            'is_admin' => $this->is_admin,
        ];

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        User::updateOrCreate(['id' => $this->user_id], $data);

        $this->reset(['user_id', 'name', 'email', 'password', 'is_admin']);
        $this->showModal = false;
    }

    public function toggleSuspend($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_suspended' => !$user->is_suspended]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        User::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->confirmingForceDelete = false;
        $this->deleteId = null;
    }

    public function confirmForceDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingForceDelete = true;
    }

    public function forceDelete()
    {
        User::withTrashed()->findOrFail($this->deleteId)->forceDelete();
        $this->confirmingForceDelete = false;
        $this->deleteId = null;
    }

    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
    }

    public function render()
    {
        $users = User::withTrashed()
            ->when($this->searchName, fn($q) => $q->where('name', 'like', '%' . $this->searchName . '%'))
            ->latest()
            ->get();

        /** @var \Livewire\Features\SupportPageComponents\View $view */
        $view = view('livewire.admin.usuarios', [
            'users' => $users,
            'trashedIds' => User::onlyTrashed()->pluck('id')->toArray(),
        ]);

        return $view->layout('layouts.admin');
    }
}