<?php

namespace App\Livewire\Admin\Comprobantes\Cotizaciones;

use DateTime;
use Carbon\Carbon;
use App\Models\Ventas;
use Livewire\Component;
use App\Models\Cotizaciones;
use App\Models\EnvioResumen;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Http\Controllers\Facturacion\Api\ApiFacturacion;

class Index extends Component
{
    use WithPagination;

    #[Url(except: '')]
    public $search = '';

    #[Url(except: 'null')]
    public $estado = 'null';


    protected $listeners = [
        'update' => 'render',
        'render-table' => 'render'
    ];


    public function render()
    {
        $ventas = Cotizaciones::whereHas('cliente', function ($cliente) {
            $cliente->where('razon_social', 'LIKE', '%' . $this->search . '%')
                ->orWhere('numero_documento', 'LIKE', '%' . $this->search . '%');
        })
            ->orWhere('serie', 'LIKE', '%' . $this->search . '%')
            ->orWhere('correlativo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('serie_correlativo', 'LIKE', '%' . $this->search . '%')
            ->orwhereDate('fecha_emision', $this->validateDate($this->search) ? Carbon::createFromFormat('d-m-Y', $this->search)->format('Y-m-d') : '')
            ->orderby('id', 'desc')
            ->with('cliente')
            ->paginate(10);;;

        $pendientes = Cotizaciones::where('estado', '0')->count();
        $aceptadas = Cotizaciones::where('estado', '1')->count();
        $rechazadas = Cotizaciones::where('estado', '2')->count();
        $total = Cotizaciones::all()->count();

        $totales = [
            'pendientes' => $pendientes,
            'aceptadas' => $aceptadas,
            'rechazadas' => $rechazadas,
            'total' => $total,
        ];

        return view('livewire.admin.comprobantes.cotizaciones.index', compact('ventas'));
    }


    function validateDate($date, $format = 'd-m-Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function openModalDelete(Cotizaciones $venta)
    {

        $this->emit('openModalDelete', $venta);
    }
}
