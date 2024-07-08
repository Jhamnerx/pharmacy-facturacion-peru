<?php

namespace App\Livewire\Admin\Comprobantes\Pos;

use App\Models\Comprobantes;
use App\Models\Ventas;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalFinish extends Component
{
    public $showModal = false;
    public $venta;

    public $numero_celular = '';
    public $email = '';
    public $ruta = '';
    public $cel_verificado = false;

    public function render()
    {
        return view('livewire.admin.comprobantes.pos.modal-finish');
    }


    #[On('finishVenta')]
    public function showModal(Ventas $venta)
    {
        $this->venta = $venta;
        $this->showModal = true;
    }

    public function nuevaVenta()
    {
        $this->showModal = false;
    }

    public function updatedNumeroCelular($value)
    {
        if (strlen($value) == 9) {
            $this->cel_verificado = true;
            $this->sendWhatsApp();
        } else {
            $this->cel_verificado = false;
        }
    }

    public function sendWhatsApp()
    {

        $url = 'https://api.whatsapp.com/send?phone=51' . $this->numero_celular . '&text=Hola, tu comprobante de pago es: ' . $this->venta->serie . '-' . $this->venta->correlativo . ' puedes verlo en: ';
        $this->ruta = $url;
    }

    public function sendEmailInvoice()
    {
    }
}
