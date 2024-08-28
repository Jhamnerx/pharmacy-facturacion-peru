<?php

namespace App\Livewire\Admin\Ventas;

use App\Models\Ventas;
use Livewire\Component;
use Livewire\Attributes\On;

class Delete extends Component
{

    public $showModal = false;

    public Ventas $venta;

    public function render()
    {
        return view('livewire.admin.ventas.delete');
    }

    #[On('open-modal-delete')]
    public function openModal(Ventas $venta)
    {
        $this->showModal = true;
        $this->venta = $venta;
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        try {
            foreach ($this->venta->detalle as $item) {

                $item->producto->incrementStockByLote($item->cantidad);
            }

            $this->venta->delete();
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'No se pudo eliminar la venta'
            );
        }

        $this->afterDelete();
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'VENTA ELIMINADA',
            mensaje: 'se elimino correctamente la venta'
        );

        $this->closeModal();
        $this->dispatch('update-table');
    }
}
