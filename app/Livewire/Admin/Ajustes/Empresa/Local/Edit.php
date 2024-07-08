<?php

namespace App\Livewire\Admin\Ajustes\Empresa\Local;

use App\Models\Locales;
use Livewire\Component;
use Livewire\Attributes\On;

class Edit extends Component
{

    public $showModal = false;
    public $local;
    public $nombre, $direccion;

    #[On('open-modal-edit-local')]
    public function openModal(Locales $local)
    {
        $this->local = $local;
        $this->nombre = $local->nombre;
        $this->direccion = $local->direccion;
        $this->showModal = true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.admin.ajustes.empresa.local.edit');
    }

    public function updatedNombre()
    {
        $this->nombre = strtoupper($this->nombre);
    }
    public function save()
    {

        $data = $this->validate();

        try {

            $this->local->update(
                [
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion'],
                ]
            );

            $this->afterSave($this->local);
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }
    public function afterSave($local)
    {
        $this->close();
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'LOCAL ACTUALIZADO',
            mensaje: 'El local ' . $local->nombre . ' fue actualizado correctamente'
        );
        $this->dispatch('update-table');
        $this->resetProp();
    }

    public function resetProp()
    {
        $this->reset(['nombre', 'direccion']);
    }
    public function close()
    {
        $this->showModal = false;
        $this->resetProp();
    }
}
