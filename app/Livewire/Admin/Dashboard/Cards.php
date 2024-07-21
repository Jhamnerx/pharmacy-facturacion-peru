<?php

namespace App\Livewire\Admin\Dashboard;

use Carbon\Carbon;
use App\Models\Ventas;
use Livewire\Component;
use Livewire\Attributes\On;

class Cards extends Component
{
    public $fecha;
    public $TotalFacturas = 0.00;
    public $totalBoletas = 0.00;
    public $totalNotasVenta = 0.00;
    public $total_ventas = 0.00;

    public function mount()
    {
        $this->fecha = Carbon::now()->format('Y-m-d');
        $this->setMontos();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.cards');
    }


    public function calcularTotalFacturas()
    {

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $this->fecha)->startOfDay();

        $totalSoles  = Ventas::where('tipo_comprobante_id', '01')
            ->where('divisa', 'PEN')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', now()->endOfDay()) // Hasta hoy
            ->sum('total');


        // Obtener ventas en dólares con tipo de cambio y sumarlas
        $ventasDolares = Ventas::where('tipo_comprobante_id', '01')
            ->where('divisa', 'USD')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', now()->endOfDay())
            ->get();

        $totalDolaresConvertidos = 0;

        foreach ($ventasDolares as $venta) {
            $totalDolaresConvertidos += $venta->total * $venta->tipo_cambio;
        }

        $this->TotalFacturas = $totalSoles + $totalDolaresConvertidos;
    }

    public function calcularTotalBoletas()
    {

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $this->fecha)->startOfDay();

        $totalSoles  = Ventas::where('tipo_comprobante_id', '03')
            ->where('divisa', 'PEN')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', now()->endOfDay()) // Hasta hoy
            ->sum('total');

        // Obtener ventas en dólares con tipo de cambio y sumarlas
        $ventasDolares = Ventas::where('tipo_comprobante_id', '03')
            ->where('divisa', 'USD')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', now()->endOfDay())
            ->get();

        $totalDolaresConvertidos = 0;

        foreach ($ventasDolares as $venta) {
            $totalDolaresConvertidos += $venta->total * $venta->tipo_cambio;
        }

        $this->totalBoletas = $totalSoles + $totalDolaresConvertidos;
    }

    public function calcularTotalNotasVenta()
    {

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $this->fecha)->startOfDay();

        $totalSoles  = Ventas::where('tipo_comprobante_id', '02')
            ->where('divisa', 'PEN')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', now()->endOfDay()) // Hasta hoy
            ->sum('total');

        // Obtener ventas en dólares con tipo de cambio y sumarlas
        $ventasDolares = Ventas::where('tipo_comprobante_id', '02')
            ->where('divisa', 'USD')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', now()->endOfDay())
            ->get();

        $totalDolaresConvertidos = 0;

        foreach ($ventasDolares as $venta) {
            $totalDolaresConvertidos += $venta->total * $venta->tipo_cambio;
        }

        $this->totalNotasVenta = $totalSoles + $totalDolaresConvertidos;
    }

    public function calcularTotalVentas()
    {
        $total = round($this->TotalFacturas + $this->totalBoletas + $this->totalNotasVenta, 2);
        return $total;
    }

    #[On('search-card-totales')]
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        $this->setMontos();
    }

    #[On('echo:ventas,VentaCreada')]
    public function setMontos()
    {
        $this->calcularTotalFacturas();
        $this->calcularTotalBoletas();
        $this->calcularTotalNotasVenta();
        $this->total_ventas = $this->calcularTotalVentas();
    }
}
