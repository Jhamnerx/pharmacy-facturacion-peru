<?php

namespace App\Observers;

use App\Events\VentaCreada;
use Carbon\Carbon;
use App\Models\Ventas;
use Illuminate\Support\Facades\App;

class VentasObserver
{

    public function created(Ventas $ventas): void
    {
        VentaCreada::dispatch();
        $ventas->fecha_hora_emision = Carbon::now();
        $ventas->save();
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
