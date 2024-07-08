<?php

namespace App\Livewire\Admin\Dashboard\Cards;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Productos;

class ProductosVencimiento extends Component
{

    public function render()
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Calcular la fecha límite (30 días a partir de hoy)
        $fechaLimite = $fechaActual->copy()->addDays(30);

        // Consultar productos cuya fecha de vencimiento está dentro del rango
        $productos = Productos::whereNotNull('fecha_vencimiento') // Asegurarse de que la fecha de vencimiento no sea nula
            ->whereDate('fecha_vencimiento', '<=', $fechaLimite) // Fecha de vencimiento debe ser menor o igual a la fecha límite
            ->paginate(10);

        return view('livewire.admin.dashboard.cards.productos-vencimiento', compact('productos'));
    }
}
