<?php

namespace App\Livewire\Admin\Payments;

use App\Models\CajaChica;
use App\Models\Payments;
use App\Models\Ventas;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $showModal = false;
    public $nuevoPago = false;

    public $pagos = [];

    public $totalPagado = 0, $totalAPagar = 0, $pendienteDePago = 0;

    public Collection $payments;
    public Collection $cajas;
    public Ventas $venta;

    public $fecha, $monto = 0.00, $metodo_pago_id = "009", $numero_referencia = null, $payed = true, $caja_chica_id;

    public function agregarPago()
    {
        $this->nuevoPago = true;
        $this->monto = $this->pendienteDePago;
    }

    public function mount()
    {
        $this->payments = collect();
        $this->cajas = collect();
        $this->fecha = now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.admin.payments.create');
    }

    #[On('payment-deleted')]
    public function onPaymentDeleted()
    {
        $this->payments = $this->venta->payments;
        $this->calcularMontos();
    }

    public function eliminarPago(Payments $pago)
    {
        $this->dispatch('open-modal-delete-payment', pago: $pago);
    }

    #[On('open-modal-create-payments')]
    public function openModal(Ventas $venta)
    {
        $this->payments = $venta->payments;
        $this->venta = $venta;
        $this->cajas = CajaChica::where('estado', 'abierta')->where('user_id', auth()->id())->pluck('id', 'numero_referencia');
        $this->showModal = true;
        $this->resetValues();
        $this->calcularMontos();
    }

    public function resetValues()
    {
        $this->nuevoPago = false;
        $this->fecha = now()->format('Y-m-d');
        $this->monto = 0.00;
        $this->metodo_pago_id = "009";
        $this->numero_referencia = null;
        $this->payed = true;
        $this->caja_chica_id = null;
    }

    public function calcularMontos()
    {
        $this->payments = $this->venta->payments;
        $this->totalPagado = $this->payments->sum('monto');
        $this->totalAPagar = $this->venta->total;
        $this->pendienteDePago = $this->totalAPagar - $this->totalPagado;
    }

    public function cancelarPago()
    {

        $this->nuevoPago = false;
        $this->calcularMontos();
        $this->monto = $this->pendienteDePago;
    }

    public function guardarPago()
    {
        $datos = $this->validate([
            'monto' => 'required|numeric|min:0.01|max:' . $this->pendienteDePago,
            'metodo_pago_id' => 'required|exists:metodo_pago,codigo',
            'caja_chica_id' => 'required|exists:cajas_chicas,id',
            'fecha' => 'required|date',
            'numero_referencia' => 'nullable',
            'payed' => 'required|boolean',
        ], [
            'monto.required' => 'El monto es requerido',
            'monto.numeric' => 'El monto debe ser un número',
            'monto.min' => 'El monto debe ser mayor a 0',
            'metodo_pago_id.required' => 'El método de pago es requerido',
            'metodo_pago_id.exists' => 'El método de pago no es válido',
            'caja_chica_id.required' => 'La caja chica es requerida',
            'caja_chica_id.exists' => 'La caja chica no es válida',
            'fecha.required' => 'La fecha es requerida',
            'fecha.date' => 'La fecha no es válida',
            'numero_referencia.required' => 'El número de referencia es requerido',
            'payed.required' => 'El estado de pago es requerido',
            'payed.boolean' => 'El estado de pago no es válido',

        ]);

        try {
            DB::beginTransaction();
            $this->venta->payments()->create([
                'monto' => $datos['monto'],
                'descripcion' => 'Pago de la venta ' . $this->venta->serie_correlativo,
                'metodo_pago_id' => $datos['metodo_pago_id'],
                'payed' => $datos['payed'],
                'caja_chica_id' => $datos['caja_chica_id'],
                'fecha' => $datos['fecha'],
                'numero_referencia' => $datos['numero_referencia'],

            ]);

            $this->afterSave();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }


    public function afterSave()
    {

        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'Pago registrado',
            mensaje: 'El pago ha sido registrado correctamente',
        );
        // $this->payments = $this->venta->payments;
        $this->calcularMontos();
        $this->resetValues();

        //$this->showModal = false;
    }
}
