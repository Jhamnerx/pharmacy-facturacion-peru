<?php

namespace App\Livewire\Admin\Dashboard\Cards;

use Carbon\Carbon;
use App\Models\Ventas;
use Livewire\Component;
use Livewire\Attributes\On;

class NotasVenta extends Component
{
    public $fechas = [];
    public $total = 0.00;

    public function mount()
    {
        $startDate = Carbon::now()->subDays(6)->format('Y-m-d'); // Hace 6 días
        $endDate = Carbon::now()->format('Y-m-d'); // Hoy

        $this->fechas = [$startDate, $endDate];
        $this->calcularTotalFacturas();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.cards.notas-venta');
    }

    public function calcularTotalFacturas()
    {
        // Asegurarse de que el array de fechas tenga dos elementos
        if (count($this->fechas) < 2) {
            return;
        }

        // Convertir las fechas del array a instancias de Carbon
        $fechaInicio = Carbon::parse($this->fechas[0])->startOfDay();
        $fechaFin = Carbon::parse($this->fechas[1])->endOfDay();

        // Calcular el total en soles
        $totalSoles  = Ventas::where('tipo_comprobante_id', '02')
            ->where('divisa', 'PEN')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', $fechaFin)
            ->sum('total');

        // Obtener ventas en dólares con tipo de cambio y sumarlas
        $ventasDolares = Ventas::where('tipo_comprobante_id', '02')
            ->where('divisa', 'USD')
            ->whereDate('created_at', '>=', $fechaInicio)
            ->whereDate('created_at', '<=', $fechaFin)
            ->get();

        $totalDolaresConvertidos = 0;

        foreach ($ventasDolares as $venta) {
            $totalDolaresConvertidos += $venta->total * $venta->tipo_cambio;
        }

        $this->total = $totalSoles + $totalDolaresConvertidos;
    }



    #[On('search-card-totales')]
    public function setFecha($fechas)
    {
        $this->fechas = $fechas;
        $this->setMontos();
    }

    #[On('echo:ventas,VentaCreada')]
    public function setMontos()
    {
        $this->calcularTotalFacturas();
    }
}
