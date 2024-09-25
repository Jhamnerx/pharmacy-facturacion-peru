<?php

namespace App\Observers;

use App\Models\Compras;
use App\Models\CajaChica;
use Illuminate\Support\Facades\App;

class ComprasObserver
{
    /**
     * Handle the Compras "created" event.
     */
    public function creating(Compras $compras)
    {

        if (!App::runningInConsole()) {

            $compras->local_id = session('local_id');
            $compras->user_id = auth()->id();
            $compras->serie_correlativo = $compras->serie . '-' . $compras->correlativo;
        }
    }
    public function created(Compras $compras)
    {
        $this->registrarMovimiento($compras);
    }

    public function registrarMovimiento($compra)
    {
        // Buscar la caja chica abierta del usuario autenticado
        $caja = CajaChica::where('user_id', auth()->user()->id)
            ->where('estado', 'abierta')
            ->first();

        // Verificar que la caja chica está abierta
        if (!$caja) {
            throw new \Exception('No hay ninguna caja chica abierta para este usuario.');
        }

        // Calcular el monto en PEN (si la venta es en dólares, convertir)
        $monto = $compra->divisa === 'PEN'
            ? $compra->total
            : $compra->total / $compra->tipo_cambio; // Convertir a PEN usando el tipo de cambio

        // Registrar el movimiento en la caja chica
        $compra->movimientos()->create([
            'caja_chica_id'    => $caja->id,
            'tipo'             => 'egreso',
            'monto'            => round($monto, 4), // Redondear a 4 decimales
            'descripcion'      => 'Compra registrada, Serie: ' . $compra->serie . '-' . $compra->correlativo,
            'fecha'            => now(),
            'user_id'          => auth()->id(),
            'created_by'       => auth()->id(),
            'local_id'         => $compra->local_id,

        ]);
    }

    public function updating(Compras $compras)
    {

        if (!App::runningInConsole()) {

            $compras->serie_correlativo = $compras->serie . '-' . $compras->correlativo;
        }
    }

    /**
     * Handle the Compras "updated" event.
     */
    public function updated(Compras $compras): void
    {
        //
    }

    /**
     * Handle the Compras "deleted" event.
     */
    public function deleted(Compras $compras): void
    {
        //
    }

    /**
     * Handle the Compras "restored" event.
     */
    public function restored(Compras $compras): void
    {
        //
    }

    /**
     * Handle the Compras "force deleted" event.
     */
    public function forceDeleted(Compras $compras): void
    {
        //
    }
}
