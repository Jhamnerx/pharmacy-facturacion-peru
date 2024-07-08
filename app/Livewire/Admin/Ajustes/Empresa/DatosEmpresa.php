<?php

namespace App\Livewire\Admin\Ajustes\Empresa;

use App\Models\Empresa;
use App\Models\Locales;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Imports\CatalagoImport;
use Illuminate\Support\Collection;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class DatosEmpresa extends Component
{
    use WithFileUploads;

    public Empresa $empresa;
    public $ruc, $razon_social, $nombre_comercial, $nombre_web, $telefono, $correo, $direccion, $igv, $icbper, $modo = false;

    public Collection $terminos;


    public $file;
    public Collection $errorInfo;

    public function mount()
    {
        $this->empresa = Empresa::first();
        // datos empresa
        $this->ruc = $this->empresa->ruc;
        $this->razon_social = $this->empresa->razon_social;
        $this->nombre_comercial = $this->empresa->nombre_comercial;
        $this->nombre_web = $this->empresa->nombre_web;
        $this->telefono = $this->empresa->telefono;
        $this->correo = $this->empresa->correo;
        $this->direccion = $this->empresa->direccion;
        $this->igv = $this->empresa->igvbnormal;
        $this->icbper = $this->empresa->icbper;
        $this->modo = $this->empresa->modo == "local" ? false : true;

        // terminos
        $this->terminos = collect($this->empresa->terminos);

        $this->errorInfo = collect();
    }

    #[On('update-table')]
    public function updateTable()
    {
        $this->render();
    }

    public function render()
    {
        $locales = Locales::paginate(5);
        return view('livewire.admin.ajustes.empresa.datos-empresa', compact('locales'));
    }

    public function saveData()
    {

        try {
            $this->validate([
                'ruc' => 'required',
                'razon_social' => 'required',
                'nombre_comercial' => 'required',
                'nombre_web' => 'nullable',
                'telefono' => 'required',
                'correo' => 'required',
                'direccion' => 'required',
                'igv' => 'required',
                'icbper' => 'required',
            ]);

            $this->empresa->update(
                [
                    'ruc' => $this->ruc,
                    'razon_social' => $this->razon_social,
                    'nombre_comercial' => $this->nombre_comercial,
                    'nombre_web' => $this->nombre_web,
                    'telefono' => $this->telefono,
                    'correo' => $this->correo,
                    'direccion' => $this->direccion,
                    'igvbnormal' => $this->igv,
                    'icbper' => $this->icbper,
                    'modo' => $this->modo  ? 'produccion' : 'local',
                ]
            );
            $this->dispatch(
                'notify-toast',
                icon: 'success',
                width: '34em',
                title: 'DATOS DE EMPRESA ACTUALIZADOS',
                mensaje: 'La información fue actualizada correctamente'
            );
        } catch (\Throwable $th) {

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }

    public function addItem()
    {
        $this->terminos->push(
            "",
        );
    }
    public function eliminar($key)
    {
        unset($this->terminos[$key]);
    }

    public function saveTerminos()
    {
        $this->validate([
            'terminos.*' => 'required',
        ], [
            'terminos.*.required' => 'El campo no puede estar vacio',
        ]);

        try {


            $this->empresa->update([
                'terminos' => $this->terminos,
            ]);

            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'TERMINOS ACTUALIZADOS',
                mensaje: 'se actualizo la informacion'
            );
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'OCURRIO UN ERROR',
                mensaje: 'Error' . $th->getMessage() . "."
            );
        }
    }

    public function openModalCreateLocal()
    {
        $this->dispatch('open-modal-create-local');
    }

    public function openModalEdit(Locales $local)
    {
        $this->dispatch('open-modal-edit-local', $local);
    }

    public function importExcel()
    {

        $this->validate([
            'file' => 'required',
        ], [
            'file.required' => 'El archivo es requerido',
            'file.extensions' => 'El archivo debe ser un archivo de tipo: xlsx',
        ]);

        try {

            $import = Excel::import(new CatalagoImport, $this->file);

            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'IMPORTACION EXITOSA',
                mensaje: 'Se importaron los datos correctamente'
            );
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $this->errorInfo = collect($failures);
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR EN LA IMPORTACION',
                mensaje: 'Se encontraron errores en la importacion'
            );
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'OCURRIO UN ERROR',
                mensaje: 'Error' . $th->getMessage() . "."
            );
        }
    }
}
