<?php

namespace App\Livewire\Admin\Usuarios;

use App\Models\User;
use App\Models\Locales;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $showModal = false;
    public $usuario;
    public $name, $email, $password, $password_confirmation, $roles_id, $local_id;


    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->usuario->id,
            'password' => 'confirmed',
            'roles_id' => 'required',
            'local_id' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un correo válido',
            'email.unique' => 'El campo email ya está en uso',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'roles_id.required' => 'Selecciona los roles del usuario',
            'local_id.required' => 'Selecciona el local del usuario'
        ];
    }


    public function render()
    {
        $roles = Role::all()->select('name', 'id');
        $locales = Locales::all()->select('nombre', 'id');
        return view('livewire.admin.usuarios.edit', compact('roles', 'locales'));
    }

    #[On('open-modal-edit')]
    public function openModal(User $usuario)
    {

        $this->showModal = true;
        $this->usuario = $usuario;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->roles_id = $usuario->roles->pluck('id');
        $this->local_id = $usuario->local_id;
    }

    public function save()
    {
        $this->validate();

        $this->usuario->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $this->usuario->password,
            'local_id' => $this->local_id
        ]);

        $this->usuario->syncRoles($this->roles_id);
        $this->dispatch('update-table');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetProps();
        $this->resetErrorBag();
    }

    public function resetProps()
    {
        $this->reset();
    }
}
