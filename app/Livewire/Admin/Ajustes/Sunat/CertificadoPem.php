<?php

namespace App\Livewire\Admin\Ajustes\Sunat;

use App\Models\Empresa;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class CertificadoPem extends Component
{
    public $data = '';
    public Empresa $empresa;


    public function mount()
    {
        $this->empresa = Empresa::first();
        $this->data = Storage::disk('facturacion')->get('certificado/certificado.pem');
    }

    public function render()
    {
        return view('livewire.admin.ajustes.sunat.certificado-pem');
    }

    public function uploadCertificado()
    {

        try {
            $ruta = '/certificado/certificado.pem';

            //actualizar la ruta del certificado
            $this->empresa->update(['ruta_cert' => '/certificado' .  '/certificado']);

            Storage::disk('facturacion')->put($ruta, $this->data);

            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'CERTIFICADO SUBIDO',
                mensaje: 'Se guardo el certificado',
            );
            $this->redirect(route('admin.ajustes.sunat'));
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'mensaje: ' . $th->getMessage(),
            );
        }
    }

    #[On('update-pem')]
    public function reRender()
    {
        $this->render();
    }
}
