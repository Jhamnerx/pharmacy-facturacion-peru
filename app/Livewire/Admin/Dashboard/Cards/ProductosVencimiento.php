<?php

namespace App\Livewire\Admin\Dashboard\Cards;

use Carbon\Carbon;
use App\Models\Lote;
use Livewire\Component;

class ProductosVencimiento extends Component
{

    public function render()
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Calcular la fecha límite (60 días a partir de hoy)
        $fechaLimite = $fechaActual->copy()->addDays(60);

        // Consultar productos cuya fecha de vencimiento está dentro del rango de 60 días
        $lotesVencidos = Lote::whereNotNull('fecha_vencimiento')->where('fecha_vencimiento', '<', $fechaLimite)->paginate(10, ['*'], 'lotesVencidos');

        return view('livewire.admin.dashboard.cards.productos-vencimiento', compact('lotesVencidos'));
    }
}
