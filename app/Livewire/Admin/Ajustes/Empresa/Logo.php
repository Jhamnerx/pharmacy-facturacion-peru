<?php

namespace App\Livewire\Admin\Ajustes\Empresa;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithFileUploads;

class Logo extends Component
{
    use WithFileUploads;

    public $file;
    public Empresa $empresa;

    public function render()
    {
        return view('livewire.admin.ajustes.empresa.logo');
    }

    public function mount(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    public function deleteLogo()
    {

        if (file_exists(storage_path('app/public/' . $this->empresa->logo))) {
            unlink(storage_path('app/public/' . $this->empresa->logo));
        }

        $this->empresa->logo = null;
        $this->empresa->save();

        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'IMAGEN ELIMINADA',
            mensaje: 'Imagen Logo Eliminada Correctamente.'
        );
    }

    public function updatedLogo()
    {

        $this->validate([
            'file' => 'image|max:1024', // 1MB Max
        ], [
            'file.image' => 'el archivo debe ser una imagen',
            'file.max' => 'El tamaño debe ser menor a 1MB'
        ]);
    }

    public function save()
    {
        $this->validate([
            'file' => 'image|max:1024', // 1MB Max
        ], [
            'file.image' => 'el archivo debe ser una imagen',
            'file.max' => 'El tamaño debe ser menor a 1MB'
        ]);

        $url = $this->file->storeAs('imagenes', 'logo.png', 'public');
        $this->empresa->logo = $url;
        $this->empresa->save();

        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'IMAGEN GUARDADA',
            mensaje: 'Imagen Logo Guardada Correctamente.'
        );
    }
}
