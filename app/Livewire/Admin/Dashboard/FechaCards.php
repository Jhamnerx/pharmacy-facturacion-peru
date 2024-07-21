<?php

namespace App\Livewire\Admin\Dashboard;

use Carbon\Carbon;
use Livewire\Component;

class FechaCards extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.fecha-cards');
    }

    public function setDate($date)
    {
        $this->dispatch('search-card-totales', fechas: $date);
    }
}
