<?php

namespace App\Livewire\Admin\Categorias;

use Livewire\Component;
use App\Models\Categorias;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    #[\Livewire\Attributes\On('update-table')]
    public function updateTable()
    {
        $this->render();
    }

    public function render()
    {
        $categorias = Categorias::where(function ($query) {
            $query->where('descripcion', 'like', '%' . $this->search . '%')
                ->orwhere('nombre', 'like', '%' . $this->search . '%');
        })->with('productos')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('livewire.admin.categorias.index', compact('categorias'));
    }


    public function openModalCreate()
    {

        $this->dispatch('open-modal-create');
    }

    public function openModalDelete(Categorias $categoria)
    {

        $this->dispatch('open-modal-delete', categoria: $categoria);
    }

    public function openModalEdit(Categorias $categoria)
    {
        $this->dispatch('open-modal-edit', categoria: $categoria);
    }

    public function toggleStatus(Categorias $categoria)
    {
        $categoria->estado = !$categoria->estado; // Cambia el estado del toggle
        $categoria->save(); // Guarda el cambio en el modelo
    }
}
