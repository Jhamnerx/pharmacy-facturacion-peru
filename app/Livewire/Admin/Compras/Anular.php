<?php

namespace App\Livewire\Admin\Compras;

use App\Models\Lote;
use App\Models\Compras;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Anular extends Component
{
    public Compras $compra;
    public $showModal = false;

    public function render()
    {
        return view('livewire.admin.compras.anular');
    }
    #[On('open-modal-anular')]
    public function openModal(Compras $compra)
    {
        $this->compra = $compra;
        $this->showModal = true;
    }

    public function delete()
    {

        try {
            DB::beginTransaction(); // Iniciar una transacción

            $compra = $this->compra;

            $compra->update(['estado' => 'BORRADOR']);

            foreach ($compra->detalle as $detalle) {
                $producto = $detalle->producto;
                $codigoLote = $detalle->codigo_lote;
                $cantidad = $detalle->cantidad;

                $lote = Lote::where('producto_id', $producto->id)
                    ->where('codigo_lote', $codigoLote)
                    ->first();

                if ($lote) {
                    if ($lote->stock == $cantidad) {
                        // Si el stock del lote es igual a la cantidad, eliminar el lote
                        $lote->delete();
                    } else {
                        // Si el stock del lote es mayor que la cantidad, disminuir el stock del lote
                        $lote->decrement('stock', $cantidad);
                    }

                    // Disminuir el stock del producto
                    $producto->decrement('stock', $cantidad);
                } else {
                    throw new \Exception("Lote no encontrado para el producto: {$producto->nombre}");
                }
            }
            $compra->delete();

            DB::commit(); // Confirmar la transacción
            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'EXITO:',
                mensaje: 'Compra anulada correctamente',
            );
            $this->dispatch('render-table');
        } catch (\Throwable $e) {
            DB::rollBack(); // Revertir la transacción en caso de error

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $e->getMessage(),
            );
        }
    }
}
