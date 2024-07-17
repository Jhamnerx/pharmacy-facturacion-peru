<?php

namespace App\Livewire\Admin\Comprobantes\Pos;

use Exception;
use App\Models\Ventas;
use Livewire\Component;
use Livewire\Attributes\On;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

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
        $this->imprimirTicket();
    }

    public function imprimirTicket()
    {

        $client = new Client([
            'verify' => false,
        ]);

        $request = new Request('GET', route('api.print.receipt', ['venta' => $this->venta->id]));
        $res = $client->sendAsync($request)->wait();
        $datos = $res->getBody()->getContents();

        $this->dispatch('imprimir-ticket', datos: $datos);
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

    public function notifyError()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'ERROR',
            mensaje: 'Ocurrió un error '
        );
    }
}
