<?php

namespace App\Livewire\Admin\Cajas;

use Livewire\Component;
use App\Models\CajaChica;
use Livewire\Attributes\On;

class Delete extends Component
{

    public $showModal = false;
    public CajaChica $caja;

    public function render()
    {
        return view('livewire.admin.cajas.delete');
    }

    #[On('open-modal-delete')]
    public function openModal(CajaChica $caja)
    {
        $this->showModal = true;
        $this->caja = $caja;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        // Eliminar la caja chica
        $this->caja->delete();
        $this->afterDelete();
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CAJA ELIMINADA',
            mensaje: 'se elimino correctamente la CAJA'
        );
        $this->dispatch('update-table');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
