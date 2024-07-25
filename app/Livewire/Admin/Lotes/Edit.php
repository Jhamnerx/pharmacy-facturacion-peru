<?php

namespace App\Livewire\Admin\Lotes;

use App\Models\Lote;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $showModal = false;

    public $lote;
    public $codigo_lote = '';
    public $fecha_vencimiento;
    public $stock;

    public function render()
    {
        return view('livewire.admin.lotes.edit');
    }

    #[On('open-modal-edit')]
    public function openModalEdit(Lote $lote)
    {
        $this->lote = $lote;
        $this->codigo_lote = $lote->codigo_lote;
        $this->fecha_vencimiento = $lote->fecha_vencimiento ? $lote->fecha_vencimiento->format('Y-m-d') : null;
        $this->stock = $lote->stock;
        $this->showModal = true;
    }

    public function closeModal()
    {

        $this->reset('codigo_lote', 'fecha_vencimiento', 'stock');
        $this->showModal = false;
    }

    public function save()
    {

        $this->validate([
            'codigo_lote' => 'required',
            'fecha_vencimiento' => 'required',
            'stock' => 'required|numeric',
        ]);

        try {
            // Iniciar la transacción

            DB::beginTransaction();
            $lote = Lote::find($this->lote->id);

            // Asigna los nuevos valores
            $lote->codigo_lote = $this->codigo_lote;
            $lote->fecha_vencimiento = $this->fecha_vencimiento;
            $lote->stock = $this->stock;

            // Verifica si el stock ha cambiado
            if ($lote->isDirty('stock')) {
                // Ajusta el stock del producto
                $lote->producto->update([
                    'stock' => $lote->producto->stock - $lote->getOriginal('stock') + $this->stock
                ]);
            }

            // Guarda los cambios en el lote
            $lote->save();

            $this->afterSave();
            // Confirmar la transacción
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }


    public function afterSave()
    {
        $this->dispatch(
            'notify',
            icon: 'success',
            title: 'LOTE ACTUALIZADO',
            mensaje: 'El lote se ha actualizado correctamente',
        );

        $this->closeModal();
        $this->dispatch('update-table');
    }
}
