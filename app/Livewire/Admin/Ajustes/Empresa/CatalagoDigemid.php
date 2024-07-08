<?php

namespace App\Livewire\Admin\Ajustes\Empresa;

use Livewire\Component;
use Livewire\WithPagination;

class CatalagoDigemid extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {

        $productos = \App\Models\CatalogoDigemid::where('Cod_Prod', 'like', '%' . $this->search . '%')
            ->orWhere('Nom_Prod', 'like', '%' . $this->search . '%')
            ->orWhere('Concent', 'like', '%' . $this->search . '%')
            ->orWhere('Nom_Form_Farm_Simplif', 'like', '%' . $this->search . '%')
            ->orWhere('Presentac', 'like', '%' . $this->search . '%')
            ->orWhere('Fracciones', 'like', '%' . $this->search . '%')
            ->orWhere('Fec_Vcto_Reg_Sanitario', 'like', '%' . $this->search . '%')
            ->orWhere('Num_RegSan', 'like', '%' . $this->search . '%')
            ->orWhere('Nom_Titular', 'like', '%' . $this->search . '%')
            ->paginate(15);
        return view('livewire.admin.ajustes.empresa.catalago-digemid', compact('productos'));
    }
}
