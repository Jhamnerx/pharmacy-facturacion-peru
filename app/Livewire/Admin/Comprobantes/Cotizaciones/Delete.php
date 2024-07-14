<?php

namespace App\Livewire\Admin\Comprobantes\Cotizaciones;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Cotizaciones;
use Illuminate\Database\Eloquent\Model;

class Delete extends Component
{
    public Cotizaciones $presupuesto;
    public $showModal = false;

    public function delete()
    {
        $this->presupuesto->delete();

        $this->afterDelete();
    }


    #[On('open-modal-delete')]
    public function openModalDelete(Cotizaciones $presupuesto)
    {
        $this->showModal = true;
        $this->presupuesto = $presupuesto;
    }

    public function render()
    {
        return view('livewire.admin.comprobantes.cotizaciones.delete');
    }

    public function afterDelete()
    {

        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'COTIZACIÓN ELIMINADA',
            mensaje: 'Se elimino la cotización: ' . $this->presupuesto->serie_correlativo . "."
        );

        $this->dispatch('render-table');
        $this->closeModal();
    }
    public function closeModal()
    {
        $this->showModal = false;
    }
}
