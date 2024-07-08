<?php

namespace App\Observers;

use App\Models\Categorias;
use Illuminate\Support\Facades\App;

class CategoriasObserver
{

    public function creating(Categorias $categoria)
    {

        if (!App::runningInConsole()) {

            $categoria->local_id = session('local_id');
        }
    }
    /**
     * Handle the Categorias "created" event.
     */
    public function created(Categorias $categorias): void
    {
        //
    }

    /**
     * Handle the Categorias "updated" event.
     */
    public function updated(Categorias $categorias): void
    {
        //
    }

    /**
     * Handle the Categorias "deleted" event.
     */
    public function deleted(Categorias $categorias): void
    {
        //
    }

    /**
     * Handle the Categorias "restored" event.
     */
    public function restored(Categorias $categorias): void
    {
        //
    }

    /**
     * Handle the Categorias "force deleted" event.
     */
    public function forceDeleted(Categorias $categorias): void
    {
        //
    }
}
