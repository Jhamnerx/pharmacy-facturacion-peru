<?php

namespace App\Livewire\Admin\Lotes;

use App\Models\Lote;
use Livewire\Component;
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
        $lotes = Lote::whereHas('producto', function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('forma_farmaceutica', 'like', '%' . $this->search . '%')
                ->orWhere('presentacion', 'like', '%' . $this->search . '%')
                ->orWhere('numero_registro_sanitario', 'like', '%' . $this->search . '%');
        })->orWhere('codigo_lote', 'like', '%' . $this->search . '%')
            ->orWhereDate('fecha_vencimiento', 'like', '%' . $this->search . '%')
            ->with('producto')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('livewire.admin.lotes.index', compact('lotes'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openModalEdit(Lote $lote)
    {
        $this->dispatch('open-modal-edit', $lote);
    }
    public function openModalDelete(Lote $lote)
    {
        $this->dispatch('open-modal-delete', $lote);
    }
}
