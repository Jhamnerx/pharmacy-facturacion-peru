<?php

namespace App\Livewire\Admin\Ajustes\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\CategoriaPermisos;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RolesRequest;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public $showModal = false;
    public $name;
    public $rol;

    public $permission;


    public function render()
    {
        $categorias = CategoriaPermisos::all();
        return view('livewire.admin.ajustes.roles.edit', compact('categorias'));
    }

    #[On('open-modal-edit')]
    public function openModal(Role $rol)
    {
        $this->showModal = true;
        $this->permission = $rol->permissions->pluck('name')->toArray();
        $this->name = $rol->name;
        $this->rol = $rol;
    }

    public function updated($label)
    {

        $rolRequest = new RolesRequest();
        $this->validateOnly($label, $rolRequest->rules($this->rol), $rolRequest->messages());
    }

    public function closeModal()
    {
        $this->reset(['name', 'permission']);
        $this->showModal = false;
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

    public function save()
    {



        try {
            $this->rol->name = $this->name;
            $this->rol->save();

            $this->rol->syncPermissions($this->permission);
            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'ROL ACTUALIZADO:',
                mensaje: 'El rol se actualizó correctamente.',
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
