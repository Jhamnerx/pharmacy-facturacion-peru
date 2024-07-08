<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class Avatars extends Component
{
    public function render()
    {
        $usuarios = User::latest()
            ->take(4)
            ->get();

        return view('livewire.admin.dashboard.avatars', compact('usuarios'));
    }

    public function AddNewUser()
    {

        $this->dispatch(
            'notify-toast',
            icon: 'info',
            title: 'CREA UN NUEVO USUARIO',
            mensaje: 'En el modulo de usuarios'
        );
    }
}
