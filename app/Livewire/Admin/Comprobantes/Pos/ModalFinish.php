<?php

namespace App\Livewire\Admin\Comprobantes\Pos;

use App\Mail\EnviarComprobanteCliente;
use App\Models\Comprobantes;
use App\Models\Ventas;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ModalFinish extends Component
{
    public $showModal = false;
    public Ventas $venta;

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

        $url = 'https://web.whatsapp.com/send?phone=51' . $this->numero_celular . '&text=Hola, tu comprobante de pago es: ' . $this->venta->serie . '-' . $this->venta->correlativo . ' puedes verlo en: ';
        $this->ruta = $url;
    }

    public function sendEmailInvoice()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        try {

            $this->venta->enviarComprobante($this->email);

            $this->afterSendEmail();
        } catch (\Throwable $th) {
            dd($th);
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR AL ENVIAR CORREO',
                mensaje: 'Ocurrió un error al enviar el correo, intente nuevamente.'
            );
        }
    }
    public function afterSendEmail()
    {

        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CORREO ENVIADO',
            mensaje: 'El correo se envió correctamente.'
        );
        $this->resetPropiedades();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function resetPropiedades()
    {
        $this->reset('numero_celular');
        $this->reset('email');
        $this->reset('ruta');
        $this->reset('cel_verificado');
    }
}
