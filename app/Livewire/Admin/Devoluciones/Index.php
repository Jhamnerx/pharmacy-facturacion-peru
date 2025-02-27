<?php

namespace App\Livewire\Admin\Devoluciones;

use DateTime;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Devoluciones;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

class Index extends Component
{

    public $search;

    public function render()
    {
        $devoluciones = Devoluciones::whereHas('venta', function ($venta) {
            $venta->orWhere('serie_correlativo', 'LIKE', '%' . $this->search . '%')
                ->orwhereDate('fecha_emision', $this->validateDate($this->search) ? Carbon::createFromFormat('d-m-Y', $this->search)->format('Y-m-d') : '')
                ->whereHas('cliente', function ($cliente) {
                    $cliente->where('razon_social', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('numero_documento', 'LIKE', '%' . $this->search . '%');
                });
        })->orwhereDate('fecha_emision', $this->validateDate($this->search) ? Carbon::createFromFormat('d-m-Y', $this->search)->format('Y-m-d') : '')
            ->orderby('id', 'desc')
            ->with('venta', 'venta.cliente')
            ->paginate(10);

        return view('livewire.admin.devoluciones.index', compact('devoluciones'));
    }


    function validateDate($date, $format = 'd-m-Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function imprimirTicket(Devoluciones $devolucion)
    {

        $client = new Client([
            'verify' => false,
        ]);

        $request = new Request('GET', route('api.print.receipt.devolucion', ['devolucion' => $devolucion->id]));
        $res = $client->sendAsync($request)->wait();
        $datos = $res->getBody()->getContents();
        $this->dispatch('imprimir-ticket', datos: $datos);
    }

    public function notifyError()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'ERROR',
            mensaje: 'Ocurrió un error Al imprimir'
        );
    }
}
