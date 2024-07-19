<?php

namespace App\Livewire\Admin\Productos;

use Livewire\Component;
use App\Models\Productos;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;


    #[On('update-table')]
    public function updateTable()
    {
        $this->render();
    }


    public function render()
    {
        $productos = Productos::whereHas('categoria', function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        })->orWhere('codigo', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('forma_farmaceutica', 'like', '%' . $this->search . '%')
            ->orWhere('presentacion', 'like', '%' . $this->search . '%')
            ->orWhere('numero_registro_sanitario', 'like', '%' . $this->search . '%')
            ->with('categoria', 'unit', 'image', 'lotes')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('livewire.admin.productos.index', compact('productos'));
    }


    public function openModalCreate()
    {
        $this->dispatch('open-modal-create');
    }

    public function openModalEdit(Productos $producto)
    {

        $this->dispatch('open-modal-edit', producto: $producto);
    }
    public function openModalDelete(Productos $producto)
    {

        $this->dispatch('open-modal-delete', producto: $producto);
    }
}
