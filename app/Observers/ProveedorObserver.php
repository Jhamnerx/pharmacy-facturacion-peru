<?php

namespace App\Observers;

use App\Models\Proveedores;
use Illuminate\Support\Facades\App;

class ProveedorObserver
{
    /**
     * Handle the Proveedores "created" event.
     */
    public function creating(Proveedores $proveedores): void
    {
        if (!App::runningInConsole()) {

            $proveedores->local_id = session('local_id');
            $proveedores->user_id = auth()->id();
        }
    }

    /**
     * Handle the Proveedores "updated" event.
     */
    public function updated(Proveedores $proveedores): void
    {
        //
    }

    /**
     * Handle the Proveedores "deleted" event.
     */
    public function deleted(Proveedores $proveedores): void
    {
        //
    }

    /**
     * Handle the Proveedores "restored" event.
     */
    public function restored(Proveedores $proveedores): void
    {
        //
    }

    /**
     * Handle the Proveedores "force deleted" event.
     */
    public function forceDeleted(Proveedores $proveedores): void
    {
        //
    }
}
