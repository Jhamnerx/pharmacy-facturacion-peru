<?php

namespace App\Observers;

use App\Models\CajaChica;
use Illuminate\Support\Facades\App;

class CajaChicaObserver
{


    public function creating(CajaChica $cajaChica)
    {

        if (!App::runningInConsole()) {

            $cajaChica->local_id = session('local_id');
        }
    }

    /**
     * Handle the CajaChica "created" event.
     */
    public function created(CajaChica $cajaChica): void
    {
        //
    }

    /**
     * Handle the CajaChica "updated" event.
     */
    public function updated(CajaChica $cajaChica): void
    {
        //
    }

    /**
     * Handle the CajaChica "deleted" event.
     */
    public function deleted(CajaChica $cajaChica): void
    {
        //
    }

    /**
     * Handle the CajaChica "restored" event.
     */
    public function restored(CajaChica $cajaChica): void
    {
        //
    }

    /**
     * Handle the CajaChica "force deleted" event.
     */
    public function forceDeleted(CajaChica $cajaChica): void
    {
        //
    }
}
