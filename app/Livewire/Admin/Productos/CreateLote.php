<?php

namespace App\Livewire\Admin\Productos;

use Livewire\Component;
use App\Models\Productos;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Google\Service\AdExchangeBuyerII\Product;

class CreateLote extends Component
{
    public Productos $producto;
    public $showModal = false;

    public $proveedor_id, $codigo_lote, $fecha_vencimiento, $stock = 1;

    public function render()
    {
        return view('livewire.admin.productos.create-lote');
    }

    #[On('open-modal-create-lote')]
    public function openModal(Productos $producto)
    {

        $this->producto = $producto;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate([
            'proveedor_id' => 'required',
            'codigo_lote' => 'required',
            'fecha_vencimiento' => 'required',
            'stock' => 'required',
        ]);

        try {

            DB::beginTransaction();
            // Crear lote
            $this->producto->lotes()->create([
                'proveedor_id' => $this->proveedor_id,
                'codigo_lote' => $this->codigo_lote,
                'fecha_vencimiento' => $this->fecha_vencimiento,
                'stock' => $this->stock,
            ]);
            // Actualizar stock
            $this->producto->stock += $this->stock;
            $this->producto->save();

            $this->afterSave();
            DB::commit();
            $this->closeModal();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $e->getMessage(),
            );
        }
    }


    public function afterSave()
    {
        $this->dispatch(
            'notify',
            icon: 'success',
            title: 'LOTE REGISTRADO',
            mensaje: 'Se registro el lote y el stock fue actualizado',
        );
        $this->closeModal();
        $this->dispatch('update-table');
        $this->resetProps();
    }

    public function resetProps()
    {
        $this->proveedor_id = '';
        $this->codigo_lote = '';
        $this->fecha_vencimiento = '';
        $this->stock = '';
        $this->resetErrorBag();
    }
}
