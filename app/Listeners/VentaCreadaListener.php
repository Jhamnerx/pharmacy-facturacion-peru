<?php

namespace App\Listeners;

use App\Events\VentaCreada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VentaCreadaListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VentaCreada $event): void
    {
        //
    }
}
