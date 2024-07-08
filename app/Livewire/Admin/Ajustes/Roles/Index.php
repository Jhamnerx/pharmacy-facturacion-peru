<?php

namespace App\Livewire\Admin\Ajustes\Roles;

use Spatie\Permission\Models\Role;
use Livewire\Component;

class Index extends Component
{
    public $search;

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.ajustes.roles.index', compact('roles'));
    }

    public function openModalSave()
    {
        $this->dispatch('open-moda-save');
    }
    public function openModalEdit(Role $rol)
    {
        $this->dispatch('open-modal-edit', $rol);
    }
}
