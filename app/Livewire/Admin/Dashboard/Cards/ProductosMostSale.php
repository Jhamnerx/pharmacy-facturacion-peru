<?php

namespace App\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Models\Productos;

class ProductosMostSale extends Component
{
    public function render()
    {
        $productos = Productos::orderBy('ventas', 'desc')
            ->take(40)
            ->paginate(10);

        return view('livewire.admin.dashboard.cards.productos-most-sale', compact('productos'));
    }
}
