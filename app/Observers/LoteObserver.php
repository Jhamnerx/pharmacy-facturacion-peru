<?php

namespace App\Observers;

use App\Models\Lote;
use Illuminate\Support\Facades\App;

class LoteObserver
{
    public function creating(Lote $lote)
    {
        if (!App::runningInConsole()) {

            $lote->local_id = session('local_id');
        }
    }
    /**
     * Handle the Lote "created" event.
     */
    public function created(Lote $lote): void
    {
        //
    }

    /**
     * Handle the Lote "updated" event.
     */
    public function updated(Lote $lote): void
    {
        //
    }

    /**
     * Handle the Lote "deleted" event.
     */
    public function deleted(Lote $lote): void
    {
        //
    }

    /**
     * Handle the Lote "restored" event.
     */
    public function restored(Lote $lote): void
    {
        //
    }

    /**
     * Handle the Lote "force deleted" event.
     */
    public function forceDeleted(Lote $lote): void
    {
        //
    }
}
