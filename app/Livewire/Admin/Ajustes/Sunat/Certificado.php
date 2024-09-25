<?php

namespace App\Livewire\Admin\Ajustes\Sunat;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\Facturacion\Api\ApiFacturacion;

class Certificado extends Component
{
    use WithFileUploads;

    public $file;
    public Empresa $empresa;
    public $certificados = [];

    protected $rules = [
        'file' => 'extensions:bin,p12,pfx'
    ];

    protected $messages = [
        'file.extensions' => 'El Archivo debe ser del tipo .P12'
    ];

    public function mount()
    {
        $this->empresa = Empresa::first();
        $this->certificados = $this->listCertificados();
    }


    public function render()
    {
        return view('livewire.admin.ajustes.sunat.certificado');
    }

    public function uploadCertificado()
    {
        $this->validate();

        try {
            if ($this->empresa->sunat_datos['clave_certificado_cdt'] == null) {
                $this->dispatch(
                    'notify-toast',
                    icon: 'error',
                    title: 'ERROR',
                    mensaje: 'Debe ingresar la clave del certificado',
                );
                return;
            }
            $ruta = '/certificado';

            $this->file->storeAs($ruta,  $this->file->getClientOriginalName(), 'facturacion');

            $util = new ApiFacturacion();
            $mensaje = $util->convertCertificado($ruta . "/" .  $this->file->getClientOriginalName(), $this->empresa->sunat_datos['clave_certificado_cdt']);

            if ($mensaje != 'exito') {
                $this->dispatch(
                    'notify-toast',
                    icon: 'error',
                    title: 'ERROR',
                    mensaje: 'mensaje: ' . $mensaje,
                );
                return;
            }

            $this->afterUploadCertificado();
            $this->dispatch('update-pem');
        } catch (\Throwable $th) {

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'mensaje: ' . $th->getMessage(),
            );
        }
    }

    public function afterUploadCertificado()
    {
        $this->file = null;

        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CERTIFICADO SUBIDO Y CONVERTIDO',
            mensaje: 'Se guardo y se convertio el certificado',
        );
        $this->certificados = $this->listCertificados();
    }
    public function listCertificados()
    {
        $files = glob(storage_path('app/facturacion/certificado/*'));
        $certificados = [];
        foreach ($files as $file) {
            $certificados[] = basename($file);
        }

        return $certificados;
    }
    public function deleteCertificado($certificado)
    {

        try {
            $ruta = storage_path('app/facturacion/certificado/' . $certificado);

            if (file_exists($ruta)) {
                unlink($ruta);
            }
            $this->redirect(route('admin.ajustes.sunat'));
        } catch (\Throwable $th) {

            dd($th);
        }
    }
}
