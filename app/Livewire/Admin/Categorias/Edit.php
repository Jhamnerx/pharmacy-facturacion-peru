<?php

namespace App\Livewire\Admin\Categorias;

use App\Http\Requests\CategoriasRequest;
use App\Models\Categorias;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    public $showModal = false;

    public Categorias $categoria;
    public $nombre, $descripcion;


    protected function rules()
    {
        return [
            'nombre' => 'required|unique:categorias,nombre,' . $this->categoria->id,
            'descripcion' => 'nullable',
        ];
    }

    protected function messages()
    {
        return [

            'nombre.required' => 'Ingresa un nombre',
            'nombre.unique' => 'Esta categoria ya existe',
        ];
    }

    public function render()
    {
        return view('livewire.admin.categorias.edit');
    }

    #[On('open-modal-edit')]
    public function openModal(Categorias $categoria)
    {
        $this->showModal = true;
        $this->categoria = $categoria;
        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function updated($field)
    {
        $request = new CategoriasRequest();
        $this->validateOnly($field, $request->rules());
    }

    public function updatedNombre()
    {
        $this->nombre = strtoupper($this->nombre);
    }

    public function save()
    {
        $request = new CategoriasRequest();
        $data = $this->validate($request->rules(), $request->messages());

        try {
            $this->categoria->update(
                [
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                ]
            );
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }

        $this->afterUpdate($this->categoria);
    }


    public function afterUpdate($categoria)
    {
        $this->close();
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CATEGORIA ACTUALIZADA',
            mensaje: 'La Categoria ' . $categoria->nombre . ' fue actualizada correctamente'
        );

        $this->dispatch('update-table');
        $this->resetProp();
    }

    public function resetProp()
    {
        $this->reset(['nombre', 'descripcion']);
    }
}
