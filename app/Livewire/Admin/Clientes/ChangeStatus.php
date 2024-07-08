<?php

namespace App\Livewire\Admin\Clientes;

use App\Models\Clientes;
use Livewire\Component;

class ChangeStatus extends Component
{
    public Clientes $cliente;

    public $field;

    public $is_active;

    public function mount()
    {
        $this->is_active = (bool) $this->cliente->getAttribute($this->field);
    }

    public function updating($field, $value)
    {

        $this->cliente->setAttribute($this->field, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.clientes.change-status');
    }
}
