<?php

namespace App\Livewire\Admin\Comprobantes\Cotizaciones;

use DateTime;
use Carbon\Carbon;
use App\Models\Ventas;
use Livewire\Component;
use App\Models\Cotizaciones;
use Livewire\Attributes\Url;
use Livewire\WithPagination;


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
        $presupuestos = Cotizaciones::whereHas('cliente', function ($cliente) {
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


        $estado = $this->estado;

        if ($estado != "null") {

            $presupuestos = Cotizaciones::whereHas('clientes', function ($query) {
                $query->where('razon_social', 'like', '%' . $this->search . '%');
            })
                ->orWhere('numero', 'like', '%' . $this->search . '%')
                ->orWhere('fecha', 'like', '%' . $this->search . '%')
                ->orWhere('serie_correlativo', 'like', '%' . $this->search . '%')
                ->estado($this->estado)
                ->orderBy('created_at', 'DESC')
                ->paginate(15);
        }
        return view('livewire.admin.comprobantes.cotizaciones.index', compact('presupuestos', 'totales'));
    }


    function validateDate($date, $format = 'd-m-Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function status($status = null)
    {
        $this->estado = $status;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function markAccept(Cotizaciones $presupuesto)
    {
        $presupuesto->update([
            'estado' => '1',
        ]);
        $this->render();
    }

    public function markReject(Cotizaciones $presupuesto)
    {
        $presupuesto->update([
            'estado' => '2',
        ]);
        $this->render();
    }

    public function convertToInvoice(Cotizaciones $presupuesto)
    {

        if (!$presupuesto->invoice) {


            $this->dispatch('convert-to-invoice', presupuesto: $presupuesto);
        } else {

            $this->dispatch(
                'error',
                title: 'ERROR: ',
                mensaje: 'El comprobante de este presupuesto ya fue creada',
            );
        }
    }


    public function openModalDelete(Cotizaciones $presupuesto)
    {
        $this->dispatch('open-modal-delete', presupuesto: $presupuesto);
    }

    public function modalOpenSend(Cotizaciones $presupuesto)
    {

        $this->dispatch('open-modal-send', presupuesto: $presupuesto);
    }
}
