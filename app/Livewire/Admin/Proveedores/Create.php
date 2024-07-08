<?php

namespace App\Livewire\Admin\Proveedores;

use Livewire\Component;
use App\Models\Proveedores;
use Livewire\Attributes\On;
use App\Http\Requests\ProveedoresRequest;
use App\Http\Controllers\UtilesController;

class Create extends Component
{
    public $showModal = false;


    public $tipo_documento_id = 1, $numero_documento, $razon_social, $telefono, $email, $web_site, $direccion;

    public $errorConsulta;

    public function render()
    {
        return view('livewire.admin.proveedores.create');
    }

    #[On('open-modal-create')]
    public function openModal()
    {

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $request = new ProveedoresRequest();
        $data = $this->validate($request->rules(), $request->messages());

        try {
            $proveedor = Proveedores::create($data);
            $this->afterSave($proveedor);
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
        $this->validateOnly($prop, $request->rules());
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

                        $this->razon_social = $resultado["nombres"] . " " . $resultado["apellidoPaterno"] . " " . $resultado["apellidoMaterno"];
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
            title: 'PROVEEDOR GUARDADO',
            mensaje: 'El proveedor ' . $proveedor->razon_social . ' fue registrado correctamente'
        );

        $this->dispatch('update-table');
        $this->resetProp();
    }


    public function resetProp()
    {

        $this->reset('tipo_documento_id', 'numero_documento', 'razon_social', 'telefono', 'email', 'web_site', 'direccion');
    }
}
