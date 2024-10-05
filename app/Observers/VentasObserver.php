<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Ventas;
use App\Models\CajaChica;
use App\Events\VentaCreada;
use Illuminate\Support\Facades\App;

class VentasObserver
{

    public function created(Ventas $ventas): void
    {
        VentaCreada::dispatch();
        $this->registrarMovimiento($ventas);

        $ventas->fecha_hora_emision = Carbon::now();
        $ventas->save();
    }

    public function savePayment($venta, $caja = null)
    {

        $venta->payments()->create([
            'monto' => $venta->total,
            'descripcion' => 'Pago de la venta',
            'fecha' => now(),
            'metodo_pago_id' => $venta->metodo_pago_id,
            'payed' => true,
            'numero_referencia' => 'N/A',
            'user_id' => auth()->id(),
        ]);
    }

    public function registrarMovimiento($venta)
    {
        // Buscar la caja chica abierta del usuario autenticado
        $caja = CajaChica::where('user_id', auth()->user()->id)
            ->where('estado', 'abierta')
            ->first();

        // Verificar que la caja chica está abierta
        if (!$caja) {
            throw new \Exception('No hay ninguna caja chica abierta para este usuario.');
        }

        if ($venta->forma_pago == 'CONTADO') {
            $this->savePayment($venta, $caja);
        }

        // Calcular el monto en PEN (si la venta es en dólares, convertir)
        $monto = $venta->divisa === 'PEN'
            ? $venta->total
            : $venta->total / $venta->tipo_cambio; // Convertir a PEN usando el tipo de cambio

        // Registrar el movimiento en la caja chica
        $venta->movimientos()->create([
            'caja_chica_id'    => $caja->id,
            'tipo'             => 'ingreso',
            'monto'            => round($monto, 4), // Redondear a 4 decimales
            'descripcion'      => 'Venta registrada, Serie: ' . $venta->serie . '-' . $venta->correlativo,
            'fecha'            => now(),
            'user_id'          => auth()->id(),
            'created_by'       => auth()->id(),
            'local_id'         => $venta->local_id,

        ]);
    }

    public function creating(Ventas $ventas): void
    {
        if (!App::runningInConsole()) {
            $ventas->user_id = auth()->user()->id;
            $ventas->local_id = session('local_id');
        }
    }

    /**
     * Handle the Ventas "updated" event.
     */
    public function updated(Ventas $ventas): void
    {
        //
    }

    /**
     * Handle the Ventas "deleted" event.
     */
    public function deleted(Ventas $ventas): void
    {
        //
    }

    /**
     * Handle the Ventas "restored" event.
     */
    public function restored(Ventas $ventas): void
    {
        //
    }

    /**
     * Handle the Ventas "force deleted" event.
     */
    public function forceDeleted(Ventas $ventas): void
    {
        //
    }
}
