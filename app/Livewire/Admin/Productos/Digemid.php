<?php

namespace App\Livewire\Admin\Productos;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\CatalogoDigemid;
use Livewire\Attributes\Reactive;
use Livewire\WithPagination;

class Digemid extends Component
{
    use WithPagination;
    //#[Reactive]
    public $numero_registro_sanitario;

    public function render()
    {

        $productos = \App\Models\CatalogoDigemid::where('Num_RegSan', $this->numero_registro_sanitario)
            ->paginate(15);
        return view('livewire.admin.productos.digemid', compact('productos'));
    }

    public function sendData(CatalogoDigemid $producto)

    {
        $this->dispatch('send-data-digemid', producto: $producto);
    }


    #[On('search-medicamento')]
    public function getProductos($numero_registro_sanitario)
    {
        $this->numero_registro_sanitario = $numero_registro_sanitario;
        $this->resetPage();
        $this->render();
    }
    #[On('reset-search-medicamento')]
    public function resetSearch()
    {
        $this->numero_registro_sanitario = '';
        $this->resetPage();
        $this->render();
    }
}
