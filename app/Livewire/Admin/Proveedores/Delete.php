<?php

namespace App\Livewire\Admin\Proveedores;

use Livewire\Component;
use App\Models\Proveedores;
use Livewire\Attributes\On;

class Delete extends Component
{
    public $showModal = false;

    public Proveedores $proveedor;

    public function render()
    {
        return view('livewire.admin.proveedores.delete');
    }

    #[On('open-modal-delete')]
    public function openModal(Proveedores $proveedor)
    {
        $this->showModal = true;
        $this->proveedor = $proveedor;
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        $this->proveedor->delete();
        $this->afterDelete();
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'PROVEEDOR ELIMINADO',
            mensaje: 'se elimino correctamente el proveedor'
        );

        $this->closeModal();
        $this->dispatch('update-table');
    }
}
