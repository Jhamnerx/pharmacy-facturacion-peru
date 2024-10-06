<?php

namespace App\Livewire\Admin\Cajas;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\CajaChica;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Exports\CajaChicaExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;

    public $search;

    #[On('update-table')]
    public function updatedTable()
    {
        $this->render();
    }

    public function render()
    {

        $cajas = CajaChica::whereHas('vendedor', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
            ->orWhere('numero_referencia', 'like', '%' . $this->search . '%')
            ->orWhere('monto_inicial', 'like', '%' . $this->search . '%')
            ->orWhere('monto_final', 'like', '%' . $this->search . '%')
            ->whereDate('fecha_apertura', 'like', '%' . $this->search . '%')
            ->whereDate('fecha_cierre', 'like', '%' . $this->search . '%')
            ->with('vendedor')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.cajas.index', compact('cajas'));
    }

    public function openModalCreate()
    {
        $this->dispatch('open-modal-create');
    }

    public function openModalEdit(CajaChica $cajaChica)
    {
        $this->dispatch('open-modal-edit', caja: $cajaChica);
    }

    public function openModalDelete(CajaChica $cajaChica)
    {

        $cajaChica->movimientos()->count() > 0
            ? $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'CAJA CON MOVIMIENTOS',
                mensaje: 'No se puede eliminar la caja, tiene movimientos'
            )
            : $this->dispatch('open-modal-delete', caja: $cajaChica);
    }

    public function closeCaja(CajaChica $cajaChica)
    {

        $this->dispatch('open-modal-close-caja', caja: $cajaChica);
    }

    public function reporteCaja(CajaChica $cajaChica)
    {

        $resumenPagos = $cajaChica->obtenerResumenPagos($cajaChica->id);

        $totalIngresos = $resumenPagos['totalIngresos'];
        $totalEgresos = $resumenPagos['totalEgresos'];
        $totalCPE = $resumenPagos['totalCPE'];
        $totalNotaVenta =   $resumenPagos['totalNotaVenta'];
        $resumenPagos = $resumenPagos['resumenPagos'];

        return Excel::download(
            new CajaChicaExport($cajaChica, $totalIngresos, $totalEgresos, $totalCPE, $totalNotaVenta, $resumenPagos),
            'reporte_punto_de_venta.xlsx'
        );
    }
}
