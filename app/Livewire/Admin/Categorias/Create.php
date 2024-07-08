<?php

namespace App\Livewire\Admin\Categorias;

use App\Http\Requests\CategoriasRequest;
use App\Models\Categorias;
use Livewire\Attributes\On;
use Livewire\Component;
use PhpParser\Node\Expr\New_;

class Create extends Component
{
    public $showModal = false;

    public $nombre, $descripcion;


    public function render()
    {
        return view('livewire.admin.categorias.create');
    }

    #[On('open-modal-create')]
    public function openModal()
    {
        $this->showModal = true;
    }
    public function close()
    {
        $this->showModal = false;
        $this->resetProp();
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
            $categoria = Categorias::create(
                [
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                ]
            );
            $this->afterSave($categoria);
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }

    public function afterSave($categoria)
    {
        $this->close();
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CATEGORIA REGISTRADA',
            mensaje: 'La Categoria ' . $categoria->nombre . ' fue guardada correctamente'
        );
        $this->dispatch('update-table');
        $this->resetProp();
    }

    public function resetProp()
    {
        $this->reset(['nombre', 'descripcion']);
    }
}
