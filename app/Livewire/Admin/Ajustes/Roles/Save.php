<?php

namespace App\Livewire\Admin\Ajustes\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\CategoriaPermisos;
use App\Http\Requests\RolesRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Save extends Component
{
    public $openModalSave = false;

    public $name;
    public $permission = [];

    public function render()
    {
        $categorias = CategoriaPermisos::all();
        return view('livewire.admin.ajustes.roles.save', compact('categorias'));
    }

    #[On('open-modal-save')]
    public function openModalSave()
    {
        $this->openModalSave = true;
    }

    public function checkAll()
    {

        $permisos = Permission::get();
        foreach ($permisos as $permiso) {

            if (array_search($permiso->name, $this->permission) === false) {

                array_push($this->permission, $permiso->name);
            }
        }
    }

    public function checkCategory(CategoriaPermisos $categoria)
    {

        foreach ($categoria->permisos as $permiso) {

            if (array_search($permiso->name, $this->permission) === false) {
                array_push($this->permission, $permiso->name);
            }
        }
    }


    public function uncheckAll()
    {
        $this->reset('permission');
    }

    public function closeModal()
    {
        $this->reset(['name', 'permission']);
        $this->openModalSave = false;
    }
    public function updated($label)
    {

        $rolRequest = new RolesRequest();
        $this->validateOnly($label, $rolRequest->rules($this->rol), $rolRequest->messages());
    }


    public function save()
    {
        $rolRequest = new RolesRequest();
        $this->validate($rolRequest->rules(), $rolRequest->messages());

        try {
            $rol = Role::create(['name' => $this->name]);

            $rol->syncPermissions($this->permission);
            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'ROL CREADO',
                mensaje: 'El rol se ha creado correctamente.',
            );
            $this->closeModal();
        } catch (\Throwable $th) {

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }
}
