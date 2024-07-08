<?php

namespace App\Livewire\Admin\Dashboard;

use Carbon\Carbon;
use Livewire\Component;

class FechaCards extends Component
{

    public $fecha;


    public function mount()
    {
        $this->fecha = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.admin.dashboard.fecha-cards');
    }

    public function updatedFecha()
    {
        $this->dispatch('search-card-totales', fecha: $this->fecha);
    }
}
