<?php

namespace App\Livewire\Admin\Lotes;

use App\Models\Lote;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Delete extends Component
{
    public $showModal = false;

    public Lote $lote;


    public function render()
    {
        return view('livewire.admin.lotes.delete');
    }

    #[On('open-modal-delete')]
    public function openModal(Lote $lote)
    {
        $this->showModal = true;
        $this->lote = $lote;
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        try {
            // Iniciar la transacción
            DB::beginTransaction();


            $this->lote->producto->update([
                'stock' => $this->lote->producto->stock - $this->lote->stock
            ]);

            $this->lote->delete();

            $this->afterDelete();
            // Confirmar la transacción
            DB::commit();
        } catch (\Throwable $th) {

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
            DB::rollBack();
        }
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'lote ELIMINADO',
            mensaje: 'se elimino correctamente el producto'
        );
        $this->closeModal();
        $this->dispatch('update-table');
    }
}
