<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Productos;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $showModal = false;

    public Productos $producto;

    public function render()
    {
        return view('livewire.admin.productos.delete');
    }
    #[On('open-modal-delete')]
    public function openModal(Productos $producto)
    {
        $this->showModal = true;
        $this->producto = $producto;
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        $this->producto->delete();
        $this->afterDelete();
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'PRODUCTO ELIMINADO',
            mensaje: 'se elimino correctamente el producto'
        );
        $this->closeModal();
        $this->dispatch('update-table');
    }
}
