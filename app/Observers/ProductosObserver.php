<?php

namespace App\Observers;

use App\Models\Productos;
use Illuminate\Support\Facades\App;

class ProductosObserver
{
    public function creating(Productos $productos)
    {

        if (!App::runningInConsole()) {

            $productos->local_id = session('local_id');
            $productos->user_id = auth()->id();
        }
    }

    /**
     * Handle the Productos "created" event.
     */
    public function created(Productos $productos): void
    {
        //
    }

    /**
     * Handle the Productos "updated" event.
     */
    public function updated(Productos $productos): void
    {
        //
    }

    /**
     * Handle the Productos "deleted" event.
     */
    public function deleted(Productos $productos): void
    {
        //
    }

    /**
     * Handle the Productos "restored" event.
     */
    public function restored(Productos $productos): void
    {
        //
    }

    /**
     * Handle the Productos "force deleted" event.
     */
    public function forceDeleted(Productos $productos): void
    {
        //
    }
}
