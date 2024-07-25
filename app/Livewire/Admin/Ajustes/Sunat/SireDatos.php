<?php

namespace App\Livewire\Admin\Ajustes\Sunat;

use App\Models\Empresa;
use Livewire\Component;

class SireDatos extends Component
{

    public $url, $cliente_id, $client_secret, $usuario, $clave;

    protected function rules()
    {
        return [
            'url' => 'required',
            'cliente_id' => 'required',
            'client_secret' => 'required',
            'usuario' => 'required',
            'clave' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'url.required' => 'El campo url es requerido',
            'cliente_id.required' => 'El campo cliente_id es requerido',
            'client_secret.required' => 'El campo client_secret es requerido',
            'usuario.required' => 'El campo usuario es requerido',
            'clave.required' => 'El campo clave es requerido',
        ];
    }

    public function mount(Empresa $empresa)
    {

        $this->url = $empresa->sire_datos['url'];
        $this->cliente_id = $empresa->sire_datos['cliente_id'];
        $this->client_secret = $empresa->sire_datos['cliente_secret'];
        $this->usuario = $empresa->sire_datos['usuario'];
        $this->clave = $empresa->sire_datos['clave'];
    }

    public function render()
    {
        return view('livewire.admin.ajustes.sunat.sire-datos');
    }

    public function save()
    {
        $data = $this->validate();

        try {
            $this->empresa->update([
                'sire_datos' => [
                    'url' => $data['url'],
                    'cliente_id' => $data['cliente_id'],
                    'client_secret' => $data['client_secret'],
                    'usuario' => $data['usuario'],
                    'clave' => $data['clave'],
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
            title: 'INFORMACION SIRE ACTUALIZADA',
            mensaje: 'se actualizo la informacion'
        );
    }
}
