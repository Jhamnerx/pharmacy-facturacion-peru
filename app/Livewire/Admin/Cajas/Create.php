<?php

namespace App\Livewire\Admin\Cajas;

use Livewire\Component;
use App\Models\CajaChica;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use DragonCode\Contracts\Cashier\Auth\Auth;

class Create extends Component
{
    public $showModal = false;

    public $numero_referencia = null;
    public $monto_inicial = 0.00;
    public $user_id;


    public function render()
    {
        return view('livewire.admin.cajas.create');
    }

    #[On('open-modal-create')]
    public function openModal()
    {
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
        $this->resetProp();
    }

    // Método para guardar la apertura de caja
    public function save()
    {
        $datos = $this->validate([
            'user_id' => 'required',
            'numero_referencia' => 'required|string|max:255',
            'monto_inicial' => 'required|numeric|min:0',
        ]);



        $caja = CajaChica::where('user_id', $datos['user_id'])
            ->where('estado', 'abierta')
            ->first();

        if ($caja) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'CAJA ABIERTA',
                mensaje: 'El usuario ya tiene una caja abierta'
            );
            return;
        }


        try {
            DB::beginTransaction();
            // Guardar la caja chica
            $caja = CajaChica::create([
                'user_id' => $datos['user_id'],
                'numero_referencia' => $datos['numero_referencia'],
                'monto_inicial' => $datos['monto_inicial'],
                'fecha_apertura' => now(),
                'estado' => 'abierta',
                'created_by' => auth()->user()->id,
            ]);

            // Cerrar el modal y limpiar
            $this->afterSave();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'Ocurrio un error al guardar la caja'
            );
        }
    }

    public function afterSave()
    {
        $this->close();
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CAJA APERTURADA',
            mensaje: 'La Caja se aperturo correctamente'
        );
        $this->dispatch('update-table');
        $this->resetProp();
    }

    public function resetProp()
    {
        $this->user_id = null;
        $this->numero_referencia = null;
        $this->monto_inicial = 0.00;
    }
}
