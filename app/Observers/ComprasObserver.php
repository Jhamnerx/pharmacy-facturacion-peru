<?php

namespace App\Observers;

use App\Models\Compras;
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
