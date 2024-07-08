<?php

namespace App\Livewire\Admin\Clientes;

use App\Models\Clientes;
use Livewire\Component;
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

        $clientes = Clientes::where('razon_social', 'like', '%' . $this->search . '%')
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


        return view('livewire.admin.clientes.index', compact('clientes'));
    }


    public function openModalCreate()
    {
        $this->dispatch('open-modal-create');
    }

    public function openModalEdit(Clientes $cliente)
    {

        $this->dispatch('open-modal-edit', cliente: $cliente);
    }

    public function openModalDelete(Clientes $cliente)
    {

        $this->dispatch('open-modal-delete', cliente: $cliente);
    }

    public function toggleStatus(Clientes $cliente)
    {
        $cliente->estado = !$cliente->estado; // Cambia el estado del toggle
        $cliente->save(); // Guarda el cambio en el modelo
    }
}
