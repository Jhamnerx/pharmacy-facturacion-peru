<?php

namespace App\Livewire\Admin\Cajas;

use Livewire\Component;
use App\Models\CajaChica;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\WithPagination;

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
        $this->dispatch('open-modal-delete', caja: $cajaChica);
    }

    public function closeCaja(CajaChica $cajaChica)
    {

        $montoCajaDiario = $cajaChica->movimientos()->whereDate('created_at', Carbon::now())->get()->sum('monto');

        $cajaChica->update(
            ['monto_final' => $montoCajaDiario]
        );

        $this->dispatch(
            'notify-toast',
            icon: 'error',
            title: 'CAJA CERRADA',
            mensaje: 'La Caja se cerro correctamente'
        );
        $this->render();
    }
}
