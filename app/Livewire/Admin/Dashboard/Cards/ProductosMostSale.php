<?php

namespace App\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Models\Productos;

class ProductosMostSale extends Component
{
    public function render()
    {
        // Primero, obtén los 40 productos más vendidos
        $productos =
            Productos::orderBy('ventas', 'desc')
            ->limit(10) // Limitar a los 40 productos más vendidos
            ->get();


        return view('livewire.admin.dashboard.cards.productos-most-sale', compact('productos'));
    }
}
