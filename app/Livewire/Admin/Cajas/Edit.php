<?php

namespace App\Livewire\Admin\Cajas;

use App\Models\CajaChica;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{

    public $showModal = false;

    public $numero_referencia = null;
    public $monto_inicial = 0.00;
    public $user_id;

    public CajaChica $caja;


    public function render()
    {
        return view('livewire.admin.cajas.edit');
    }

    #[On('open-modal-edit')]
    public function openModal(CajaChica $caja)
    {
        $this->caja = $caja;
        $this->numero_referencia = $caja->numero_referencia;
        $this->monto_inicial = $caja->monto_inicial;
        $this->user_id = $caja->user_id;
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
        $this->resetProp();
    }

    public function save()
    {
        $datos = $this->validate([
            'user_id' => 'required',
            'numero_referencia' => 'required|string|max:20',
            'monto_inicial' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            $this->caja->update([
                'user_id' => $datos['user_id'],
                'numero_referencia' => $datos['numero_referencia'],
                'monto_inicial' => $datos['monto_inicial'],
                'created_by' => auth()->user()->id,
            ]);

            $this->afterSave();
            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'Ocurrio un error al actualizar la caja'
            );
        }
    }
    public function afterSave()
    {

        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CAJA ACTUALIZADA',
            mensaje: 'La Caja se actualizo correctamente'
        );

        $this->close();
        $this->dispatch('update-table');
    }

    public function resetProp()
    {
        $this->numero_referencia = null;
        $this->monto_inicial = 0.00;
        $this->user_id = null;
    }
}
