<?php

namespace App\Livewire\Admin\Proveedores;

use Livewire\Component;
use App\Http\Requests\ProveedoresRequest;
use App\Http\Controllers\UtilesController;
use App\Models\Proveedores;

class Edit extends Component
{
    public $showModal = false;


    public $tipo_documento_id = 1, $numero_documento, $razon_social, $telefono, $email, $web_site, $direccion;
    public $proveedor;

    public $errorConsulta;

    public function render()
    {
        return view('livewire.admin.proveedores.edit');
    }

    #[\Livewire\Attributes\On('open-modal-edit')]
    public function openModal(Proveedores $proveedor)
    {

        $this->proveedor = $proveedor;
        $this->razon_social = $proveedor->razon_social;
        $this->numero_documento = $proveedor->numero_documento;
        $this->tipo_documento_id = $proveedor->tipo_documento_id;
        $this->email = $proveedor->email;
        $this->telefono = $proveedor->telefono;
        $this->direccion = $proveedor->direccion;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function save()
    {
        $request = new ProveedoresRequest();
        $data = $this->validate($request->rules($this->proveedor), $request->messages());

        try {
            $this->proveedor->update($data);
            $this->afterSave($this->proveedor);
        } catch (\Throwable $th) {

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }
    public function updated($prop)
    {
        $request = new ProveedoresRequest();
        $this->validateOnly($prop, $request->rules($this->proveedor));
    }


    public function updatedNumeroDocumento($numero)
    {
        if (strlen($numero) == 11) {
            $this->tipo_documento_id = 6;
        } else {
            $this->tipo_documento_id = 1;
        }

        $this->consultarCliente($numero);
    }


    public function consultarCliente($numero)
    {
        $util = new UtilesController;

        if ($this->tipo_documento_id == 1 && strlen($numero) ==  8) {

            $resultado = $util->consultaPersona($numero);
            if ($resultado) {
                if (!array_key_exists('error', $resultado)) {

                    if ($resultado["nombres"]) {
                        $this->reset('errorConsulta');
                        $this->razon_social = $resultado["nombres"];
                        // $this->direccion = $resultado["direccion"] . "" . $resultado["provincia"] . " - " . $resultado["departamento"];
                    } else {
                        $this->errorConsulta = "No se encuentra el nombre";
                    }
                } else {
                    $this->errorConsulta = "Hay un error en el documento";
                }
            } else {
                $this->errorConsulta = "No se encuentra el documento";
            }
        }

        if ($this->tipo_documento_id == 6 && strlen($numero) ==  11) {

            $resultado = $util->consultaEmpresa($numero);

            if ($resultado) {
                if (!array_key_exists('error', $resultado)) {

                    if ($resultado["razonSocial"]) {
                        $this->reset('errorConsulta');
                        $this->razon_social = $resultado["razonSocial"];
                        $this->direccion = $resultado["direccion"] . " " . $resultado["distrito"] . " - " . $resultado["provincia"] . " - " . $resultado["departamento"];
                    } else {
                        $this->errorConsulta = "No se encuentra el nombre";
                    }
                } else {
                    $this->errorConsulta = "Hay un error en el documento";
                }
            } else {
                $this->errorConsulta = "No se encuentra el documento";
            }
        }
    }

    public function afterSave($proveedor)
    {
        $this->closeModal();
        $this->dispatch(
            'notify',
            icon: 'success',
            title: 'PROVEEDOR ACTUALIZADO',
            mensaje: 'El proveedor ' . $proveedor->razon_social . ' fue actualizado correctamente'
        );

        $this->dispatch('update-table');
        $this->resetProp();
    }


    public function resetProp()
    {

        $this->reset('tipo_documento_id', 'numero_documento', 'razon_social', 'telefono', 'email', 'web_site', 'direccion');
    }
}
