<?php

namespace App\Livewire\Admin\Cajas;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\CajaChica;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class CloseCaja extends Component
{

    public $showModal = false;
    public CajaChica $caja;

    public function render()
    {
        return view('livewire.admin.cajas.close-caja');
    }

    #[On('open-modal-close-caja')]
    public function openModal(CajaChica $caja)
    {

        $this->showModal = true;
        $this->caja = $caja;
    }


    public function closeCaja()
    {
        try {

            $montoCajaDiario = $this->caja->movimientos()->whereDate('created_at', Carbon::now())->get()->sum('monto') + $this->caja->monto_inicial;

            $this->caja->update(
                [
                    'monto_final' => $montoCajaDiario,
                    'estado' => 'cerrada',
                    'fecha_cierre' => now(),
                ]
            );

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'CAJA CERRADA',
                mensaje: 'La Caja se cerro correctamente'
            );

            $this->dispatch('update-table');
        } catch (\Exception $e) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'Ocurrio un error al cerrar la caja'
            );
        }
    }
}
