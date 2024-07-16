<?php

namespace App\Livewire\Admin\Comprobantes\Pos;

use Exception;
use App\Models\Ventas;
use Livewire\Component;
use Mike42\Escpos\Printer;
use Livewire\Attributes\On;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\RawbtPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;



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

        $printerName = "POS-80"; // Asegúrate de que este nombre coincida con el nombre de tu impresora en Windows
        // $profile = CapabilityProfile::load("POS-5890");
        try {

            $connector = new WindowsPrintConnector($printerName);

            $printer = new Printer($connector);

            // Imprimir el contenido recibido
            $printer->text("Hello World!\n");
            $printer->cut();

            $printer->close();
            dd('Impresión exitosa');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        //$this->showModal = false;
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
