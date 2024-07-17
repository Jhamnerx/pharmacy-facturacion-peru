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
        $productos->codigo = self::generateProductCode();
    }

    private static function generateProductCode()
    {
        $prefix = 'MD'; // Los tres caracteres fijos
        $latestProduct = Productos::latest('id')->first();

        if (!$latestProduct) {
            $number = 1;
        } else {
            $number = intval(substr($latestProduct->codigo, strlen($prefix))) + 1;
        }

        return $prefix . str_pad($number, 5, '0', STR_PAD_LEFT); // Llenar con ceros a la izquierda para que tenga 6 dígitos
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
