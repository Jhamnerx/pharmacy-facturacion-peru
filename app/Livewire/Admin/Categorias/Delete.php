<?php

namespace App\Livewire\Admin\Categorias;

use App\Models\Categorias;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $showModal = false;

    public Categorias $categoria;

    public function render()
    {
        return view('livewire.admin.categorias.delete');
    }

    #[On('open-modal-delete')]
    public function openModal(Categorias $categoria)
    {
        $this->showModal = true;
        $this->categoria = $categoria;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete()
    {
        $this->categoria->delete();
        $this->afterDelete();
    }

    public function afterDelete()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'CATEGORIA ELIMINADA',
            mensaje: 'se elimino correctamente la categoria'
        );
        $this->dispatch('update-table');
        $this->closeModal();
    }
}
