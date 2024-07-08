<?php

namespace App\Livewire\Admin\Usuarios;

use App\Models\Locales;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{

    public $name, $email, $password, $password_confirmation;
    public $roles_id, $local_id;
    public $showModal = false;


    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|string|max:255',
            'password' => 'required|confirmed',
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
            'password.required' => 'El campo contraseña es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'roles_id.required' => 'Selecciona los roles del usuario',
            'local_id.required' => 'Selecciona el local del usuario'
        ];
    }

    public function render()
    {
        $roles = Role::all()->select('name', 'id');
        $locales = Locales::all()->select('nombre', 'id');

        return view('livewire.admin.usuarios.create', compact('roles', 'locales'));
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'local_id' => $this->local_id,
        ]);

        // ASIGNAR ROLES
        $user->assignRole($this->roles_id);
        $user->save();

        $this->dispatch('update-table');

        $this->closeModal();
    }

    #[On('open-modal-create')]
    public function openModal()
    {
        $this->showModal = true;
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
