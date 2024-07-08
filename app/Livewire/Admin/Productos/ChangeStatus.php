<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Productos;
use Livewire\Component;

class ChangeStatus extends Component
{

    public Productos $producto;

    public $field;

    public $is_active;

    public function mount()
    {
        $this->is_active = (bool) $this->producto->getAttribute($this->field);
    }

    public function updating($field, $value)
    {

        $this->producto->setAttribute($this->field, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.productos.change-status');
    }
}
