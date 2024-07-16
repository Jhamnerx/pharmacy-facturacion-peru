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
        $client = new Client();
        // $headers = [
        //     'Cookie' => 'XSRF-TOKEN=eyJpdiI6Ikh1d1FYQ0ttcEdqRm5iampiWUtzSEE9PSIsInZhbHVlIjoiNi9UVnVidHFVTmtKWlI4ZHNaV0pSbHh5bWQ5TlYwQ1QvWEZkK09Gdnk5WTVocDZmdTMwN1ZBS0VyeGc4cXFaRCtIRTdDVTJYSXRJbkMvOEhhdVRXU2Z4aW8rZjlMRlJYd2g3amVZU2FVRFpwelFlUWZVcnRRM29nSFNGa0dBbEkiLCJtYWMiOiI5MmRhOTYwYjE5NGQ0MzI1NTBlZDc1MjdlYTFhMGJmMTFkNDVmYjJjMGM5NDBkOGZlYTA4NGYxZGM1MTBhZTc1IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjZxcVFscGF2QXJjbS94SGxrT01QK1E9PSIsInZhbHVlIjoiRklsUjRpUDk5UldobDk5TlVjTy9PRGhnMjJUeEhmblV5VWZMNGxmKzBFdlo3ekdCSXk1OHpnVDNhV3hxWUtYNWgxSUFWdlgrRmVoYlJWTy92c3RhUnFKdkpCcVRKbFZhc0wxNVN5NVNwb3crWUw2V3h2aExyNERWS0J0T25ncW4iLCJtYWMiOiI2ZDFhNWJhZjFjMDgyOWJhOTVhZmIwOTRkYzE4Yjk5MGY3NTAwMDJlZDc0YTgzYzI4YjQzOWFhN2ZhZTQ2YWI0IiwidGFnIjoiIn0%3D'
        // ];
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
}
