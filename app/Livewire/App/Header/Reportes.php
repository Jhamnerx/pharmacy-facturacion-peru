<?php

namespace App\Livewire\App\Header;

use Livewire\Component;

class Reportes extends Component
{
    public function render()
    {
        return view('livewire.app.header.reportes');
    }

    public function openModalReporteVentas()
    {
        $this->dispatch('open-modal-reporte-ventas');
    }
}
