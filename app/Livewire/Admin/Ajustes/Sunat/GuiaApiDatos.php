<?php

namespace App\Livewire\Admin\Ajustes\Sunat;

use App\Models\Empresa;
use Livewire\Component;

class GuiaApiDatos extends Component
{

    public Empresa $empresa;

    public $cliente_id, $cliente_secret;

    public function mount(Empresa $empresa)
    {
        $this->empresa = $empresa;
        $this->cliente_id = $empresa->guia_api_datos['cliente_id'];
        $this->cliente_secret = $empresa->guia_api_datos['cliente_secret'];
    }


    protected function rules()
    {
        return [
            'cliente_id' => 'required',
            'cliente_secret' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'cliente_id.required' => 'El campo cliente id es requerido',
            'cliente_secret.required' => 'El campo cliente secret es requerido',
        ];
    }

    public function render()
    {
        return view('livewire.admin.ajustes.sunat.guia-api-datos');
    }

    public function save()
    {
        $data = $this->validate();
        try {
            $this->empresa->update([
                'guia_api_datos' => [
                    'cliente_id' => $data['cliente_id'],
                    'cliente_secret' => $data['cliente_secret'],
                ]
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

    public function afterSave()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'INFORMACION API GUIAS ELECTRONICAS',
            mensaje: 'se actualizo la informacion'
        );
    }
}
