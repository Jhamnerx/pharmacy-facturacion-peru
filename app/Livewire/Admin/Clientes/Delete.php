<?php

namespace App\Livewire\Admin\Clientes;

use App\Models\Clientes;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $showModal = false;

    public Clientes $cliente;

    public function render()
    {
        return view('livewire.admin.clientes.delete');
    }

    #[On('open-modal-delete')]
    public function openModal(Clientes $cliente)
    {
        $this->showModal = true;
        $this->cliente = $cliente;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        $this->cliente->delete();
        $this->afterDelete();
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'CLIENTE ELIMINADO',
            mensaje: 'se elimino correctamente el cliente'
        );

        $this->closeModal();
        $this->dispatch('update-table');
    }
}
