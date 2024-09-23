<?php

namespace App\Livewire\Admin\Cajas;

use App\Models\CajaChica;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

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
