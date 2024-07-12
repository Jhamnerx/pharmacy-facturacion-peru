<?php

namespace App\Livewire\Admin\Comprobantes\Cotizaciones;

use Exception;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Cotizaciones;
use App\Models\Presupuestos;
use App\Http\Controllers\Facturacion\PresupuestoPdfController;


class Send extends Component
{
    public $modalOpenSend = false;

    public $presupuesto;
    public $correo;
    public $disabled =  false;

    public $to, $asunto = "", $body;

    public function resetPropiedades()
    {
        $this->reset('to');
        $this->reset('asunto');
        $this->reset('body');
        $this->reset('presupuesto');
    }

    public function render()
    {
        return view('livewire.admin.comprobantes.cotizaciones.send');
    }

    #[On('open-modal-send')]
    public function openModal(Cotizaciones $presupuesto)
    {

        $this->modalOpenSend = true;
        $this->presupuesto = $presupuesto;
        $this->to = $presupuesto->clientes->email . " | " . $presupuesto->clientes->razon_social;
        $this->asunto = "COTIZACIÓN #" . $presupuesto->numero;
        $this->correo =  $presupuesto->clientes->email;

        if (empty($presupuesto->clientes->email)) {

            $this->disabled = true;
        } else {

            $this->disabled = false;
        }
    }
    public function closeModal()
    {
        $this->modalOpenSend = false;
        $this->resetPropiedades();
    }


    public function sendPresupuesto()
    {

        $data = array(
            'asunto' => $this->asunto,
            'body' => $this->body,
        );

        try {

            $pdfPresupuesto = new PresupuestoPdfController();
            $pdfPresupuesto->sendToMail($this->presupuesto, $data);
        } catch (Exception $e) {

            $this->dispatch(
                'error',
                title: 'ERROR EN FUNCION: ',
                mensaje: $e->getMessage(),
            );
        } finally {

            $this->modalOpenSend = false;
            $this->dispatch('presupuesto-send', ['presupuesto' => $this->presupuesto]);
            $this->resetPropiedades();
        }
    }
}
