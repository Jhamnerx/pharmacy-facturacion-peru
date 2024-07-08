<?php

namespace App\Livewire\Admin\Ajustes\Empresa\Local;

use App\Models\Locales;
use Livewire\Component;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Create extends Component
{
    public $showModal = false;

    public $nombre, $direccion;

    public function render()
    {
        return view('livewire.admin.ajustes.empresa.local.create');
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
        ];
    }

    #[On('open-modal-create-local')]
    public function openModal()
    {
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
        $this->resetProp();
    }

    public function updatedNombre()
    {
        $this->nombre = strtoupper($this->nombre);
    }


    public function save()
    {

        $data = $this->validate();

        try {

            $local = Locales::create(
                [
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion'],
                ]
            );

            DB::table('clientes')->insert([
                'razon_social' => 'CLIENTE VARIOS',
                'tipo_documento_id' => '1',
                'local_id' => $local->id,
                'numero_documento' => '00000000',
                'email' => '',
                'direccion' => 'SIN DIRECCION',
            ]);

            $local->series()->createMany([
                [
                    'tipo_comprobante_id' => '00',
                    'serie' => 'PRE0' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '01',
                    'serie' => 'F00' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '02',
                    'serie' => 'NV0' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '03',
                    'serie' => 'B00' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '07',
                    'serie' => 'BN0' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '07',
                    'serie' => 'FN0' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '08',
                    'serie' => 'BD0' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '08',
                    'serie' => 'FD0' . $local->id,
                    'correlativo' => '0',
                ],
                [
                    'tipo_comprobante_id' => '09',
                    'serie' => 'T00' . $local->id,
                    'correlativo' => '0',
                ],


            ]);
            $this->afterSave($local);
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }
    public function afterSave($local)
    {
        $this->close();
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'LOCAL REGISTRADO',
            mensaje: 'El local ' . $local->nombre . ' fue creado correctamente'
        );
        $this->dispatch('update-table');
        $this->resetProp();
    }

    public function resetProp()
    {
        $this->reset(['nombre', 'direccion']);
    }
}
