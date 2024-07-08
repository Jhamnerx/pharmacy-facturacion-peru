<?php

namespace App\Livewire\Admin\Proveedores;

use App\Models\Proveedores;
use Livewire\Attributes\On;
use Livewire\Component;
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
        $proveedores = Proveedores::where('razon_social', 'like', '%' . $this->search . '%')
            ->orwhere('numero_documento', 'like', '%' . $this->search . '%')
            ->orwhere(
                function ($query) {
                    return $query
                        ->where('email', 'like', '%' . $this->search . '%')
                        ->orwhere('direccion', 'like', '%' . $this->search . '%')
                        ->orwhere('telefono', 'like', '%' . $this->search . '%');
                }
            )->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.proveedores.index', compact('proveedores'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openModalCreate()
    {
        $this->dispatch('open-modal-create');
    }

    public function openModalEdit(Proveedores $proveedor)
    {

        $this->dispatch('open-modal-edit', $proveedor);
    }
    public function openModalDelete(Proveedores $proveedor)
    {

        $this->dispatch('open-modal-delete', $proveedor);
    }
    public function toggleStatus(Proveedores $proveedor)
    {
        $proveedor->estado = !$proveedor->estado; // Cambia el estado del toggle
        $proveedor->save(); // Guarda el cambio en el modelo
    }
}
