<?php

namespace App\Observers;

use App\Models\Devoluciones;
use Illuminate\Support\Facades\App;

class DevolucionesObserver
{
    /**
     * Handle the Devoluciones "created" event.
     */
    public function created(Devoluciones $devoluciones): void
    {
        //
    }
    public function creating(Devoluciones $devoluciones): void
    {
        if (!App::runningInConsole()) {
            $devoluciones->user_id = auth()->user()->id;
            $devoluciones->local_id = session('local_id');
        }
    }

    /**
     * Handle the Devoluciones "updated" event.
     */
    public function updated(Devoluciones $devoluciones): void
    {
        //
    }

    /**
     * Handle the Devoluciones "deleted" event.
     */
    public function deleted(Devoluciones $devoluciones): void
    {
        //
    }

    /**
     * Handle the Devoluciones "restored" event.
     */
    public function restored(Devoluciones $devoluciones): void
    {
        //
    }

    /**
     * Handle the Devoluciones "force deleted" event.
     */
    public function forceDeleted(Devoluciones $devoluciones): void
    {
        //
    }
}
