<?php

namespace App\Livewire\Admin\Plantilla;

use App\Models\Lote;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Productos;
use Livewire\WithPagination;

class ModalStockVencidosProductos extends Component
{
    use WithPagination;

    public $date;
    public $showModal = false;

    public function mount()
    {
        $this->date = Carbon::today()->format('Y-m-d');

        $expiredProducts = Lote::where('fecha_vencimiento', '<', $this->date)
            ->with('producto')
            ->paginate(10, ['*'], 'expiredProducts');

        $outOfStockProducts = Productos::where('stock', '<=', 0)
            ->paginate(10, ['*'], 'outOfStockProducts');

        // Mostrar el modal solo si hay productos vencidos o sin stock
        $this->showModal = $expiredProducts->count() > 0 || $outOfStockProducts->count() > 0;
    }

    public function render()
    {
        $expiredProducts = Lote::where('fecha_vencimiento', '<', $this->date)
            ->with('producto')
            ->paginate(10, ['*'], 'expiredProducts');

        $outOfStockProducts = Productos::where('stock', '<=', 0)
            ->paginate(10, ['*'], 'outOfStockProducts');


        return view('livewire.admin.plantilla.modal-stock-vencidos-productos', [
            'expiredProducts' => $expiredProducts,
            'outOfStockProducts' => $outOfStockProducts,
        ]);
    }
}
