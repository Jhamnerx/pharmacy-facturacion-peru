<?php

namespace App\Livewire\Admin\Plantilla;

use App\Models\Locales;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\UtilesController;

class Header extends Component
{

    public $page;

    public function mount($page)
    {

        if (!session()->has('local_id')) {

            session()->put('local_id', 1);
        }

        $this->page = $page;
    }

    public function render()
    {
        $locales = \App\Models\Locales::all();
        $local_actual = \App\Models\Locales::find(session('local_id'))->nombre;

        return view('livewire.admin.plantilla.header', compact('locales', 'local_actual'));
    }



    public function changeBussines(Locales $local)
    {

        session()->put('local_id', $local->id);
        Cart::destroy();
        $this->dispatch('render');
        $mensaje = "SE CAMBIO DE LOCAL, ahora veras los registros deL LOCAL: " . $local->nombre . "";
        return redirect($this->page)->with('flash.banner', $mensaje);
        return redirect($this->page)->with('flash.abnnerStyle', 'success');
        //  return redirect($this->page);
    }

    public function getTipoCambio()
    {
        $util = new UtilesController;
        $res = $util->tipoCambio();

        if ($res != "error") {
            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'TIPO CAMBIO CONSULTADO',
                mensaje: 'El tipo de cambio hoy es: ' . $res
            );
        }
    }
}
