<?php

namespace App\Observers;

use App\Models\CajaChica;
use App\Models\User;
use Illuminate\Support\Facades\App;

class CajaChicaObserver
{


    public function creating(CajaChica $cajaChica)
    {

        if (!App::runningInConsole()) {
            $user_caja = User::find($cajaChica->user_id);
            $cajaChica->local_id = $user_caja->local_id;
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
