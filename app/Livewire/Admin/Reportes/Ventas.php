<?php

namespace App\Livewire\Admin\Reportes;

use App\Exports\VentasExportSimple;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Maatwebsite\Excel\Facades\Excel;

class Ventas extends Component
{
    public $showModal = false;
    public $tipo_comprobante_id = null, $cliente_id, $vendedor_id;
    public $fecha_inicio, $fecha_fin, $estado;

    public function mount()
    {
        $this->fecha_inicio = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->fecha_fin = Carbon::now()->format('Y-m-d');
        $this->estado = 'Todos';
    }
    public function render()
    {
        return view('livewire.admin.reportes.ventas');
    }

    #[On('open-modal-reporte-ventas')]
    public function openModalReporteVentas()
    {
        $this->showModal = true;
    }

    public function exportar()
    {
        $this->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',

        ]);

        return Excel::download(new VentasExportSimple($this->fecha_fin, $this->fecha_fin, $this->estado, $this->tipo_comprobante_id, $this->cliente_id, $this->vendedor_id), 'proveedores.xls');
    }
}
