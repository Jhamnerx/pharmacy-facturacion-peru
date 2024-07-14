<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Cotizaciones;
use Illuminate\Support\Facades\App;

class CotizacionObserver
{
    /**
     * Handle the Cotizaciones "created" event.
     */
    public function created(Cotizaciones $ventas): void
    {
        $ventas->fecha_hora_emision = Carbon::now();
        $ventas->save();
    }

    public function creating(Cotizaciones $ventas): void
    {
        if (!App::runningInConsole()) {
            $ventas->user_id = auth()->user()->id;
            $ventas->local_id = session('local_id');
        }
    }

    /**
     * Handle the Cotizaciones "updated" event.
     */
    public function updated(Cotizaciones $cotizaciones): void
    {
        //
    }

    /**
     * Handle the Cotizaciones "deleted" event.
     */
    public function deleted(Cotizaciones $cotizaciones): void
    {
        //
    }

    /**
     * Handle the Cotizaciones "restored" event.
     */
    public function restored(Cotizaciones $cotizaciones): void
    {
        //
    }

    /**
     * Handle the Cotizaciones "force deleted" event.
     */
    public function forceDeleted(Cotizaciones $cotizaciones): void
    {
        //
    }
}
