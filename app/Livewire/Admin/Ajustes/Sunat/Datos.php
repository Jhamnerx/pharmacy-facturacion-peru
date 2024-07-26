<?php

namespace App\Livewire\Admin\Ajustes\Sunat;

use App\Models\Empresa;
use Livewire\Component;

class Datos extends Component
{
    public Empresa $empresa;

    public $regimen_type, $modo, $soap_type;
    public $sunat;
    public $qpse_datos;

    protected function rules()
    {
        return [
            'regimen_type' => 'required',
            'modo' => 'required',
            'soap_type' => 'required',
            'sunat.usuario_sol_sunat' => 'required',
            'sunat.clave_sol_sunat' => 'required',
            'sunat.clave_certificado_cdt' => 'nullable',
            'qpse_datos' => 'nullable',
            'qpse_datos.usuario' => 'nullable|required_if:soap_type,qpse',
            'qpse_datos.clave' => 'nullable|required_if:soap_type,qpse',

        ];
    }

    protected function messages()
    {
        return [
            'regimen_type.required' => 'El campo regimen es requerido',
            'modo.required' => 'El campo modo es requerido',
            'soap_type.required' => 'El campo soap es requerido',
            'sunat.usuario_sol_sunat.required' => 'El campo usuario es requerido',
            'sunat.clave_sol_sunat.required' => 'El campo clave es requerido',
            'qpse_datos.usuario.required_if' => 'El campo url es requerido',
            'qpse_datos.clave.required_if' => 'El campo demo url es requerido',
        ];
    }

    public function mount(Empresa $empresa)
    {
        $this->empresa = $empresa;
        $this->sunat = $empresa->sunat_datos;
        $this->qpse_datos = $empresa->qpse_datos;
        $this->regimen_type = $empresa->regimen_type;
        $this->modo = $empresa->modo;
        $this->soap_type = $empresa->soap_type;
    }

    public function render()
    {
        return view('livewire.admin.ajustes.sunat.datos');
    }

    public function saveSunat()
    {

        $data = $this->validate();

        try {
            $this->empresa->update([
                'regimen_type' => $data['regimen_type'],
                'modo' => $data['modo'],
                'soap_type' => $data['soap_type'],
                'sunat_datos' => [
                    'usuario_sol_sunat' => $data['sunat']['usuario_sol_sunat'],
                    'clave_sol_sunat' => $data['sunat']['clave_sol_sunat'],
                    'clave_certificado_cdt' => $data['sunat']['clave_certificado_cdt'],
                ],
                'qpse_datos' => [
                    'usuario' => $data['qpse_datos']['usuario'],
                    'clave' => $data['qpse_datos']['clave'],
                ],
            ]);

            $this->afterSave();
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }

    // public function saveApiSunat()
    // {
    //     $data = $this->validate([
    //         'sunat.usuario_sol_sunat' => 'required',
    //         'sunat.clave_sol_sunat' => 'required',
    //         'sunat.clave_certificado_cdt' => 'nullable',
    //         'sunat.guia_cliente_id' => 'required',
    //         'sunat.guia_secret' => 'required',
    //     ]);

    //     $this->empresa->update([
    //         'sunat_datos' => [
    //             'usuario_sol_sunat' => $data['sunat']['usuario_sol_sunat'],
    //             'clave_sol_sunat' => $data['sunat']['clave_sol_sunat'],
    //             'clave_certificado_cdt' => $data['sunat']['clave_certificado_cdt'],
    //             'guia_cliente_id' => $data['sunat']['guia_cliente_id'],
    //             'guia_secret' => $data['sunat']['guia_secret'],
    //         ]
    //     ]);

    //     $this->afterSave();
    // }

    public function afterSave()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'INFORMACION SUNAT ACTUALIZADA',
            mensaje: 'se actualizo la informacion'
        );
    }
}
