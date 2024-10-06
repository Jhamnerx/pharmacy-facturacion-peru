<?php

namespace App\Livewire\Admin\Cajas;

use App\Models\CajaChica;
use Livewire\Component;

class Delete extends Component
{

    public $showModal = false;
    public CajaChica $caja;

    public function render()
    {
        return view('livewire.admin.cajas.delete');
    }

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
        $this->close();
    }
}
