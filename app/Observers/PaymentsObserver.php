<?php

namespace App\Observers;

use App\Models\Payments;
use Illuminate\Support\Facades\App;

class PaymentsObserver
{
    /**
     * Handle the Payments "created" event.
     */
    public function created(Payments $payments): void
    {
        //

    }

    public function creating(Payments $payments): void
    {
        if (!App::runningInConsole()) {
            $payments->user_id = auth()->user()->id;
        }
    }


    /**
     * Handle the Payments "updated" event.
     */
    public function updated(Payments $payments): void
    {
        //
    }

    /**
     * Handle the Payments "deleted" event.
     */
    public function deleted(Payments $payments): void
    {
        //
    }

    /**
     * Handle the Payments "restored" event.
     */
    public function restored(Payments $payments): void
    {
        //
    }

    /**
     * Handle the Payments "force deleted" event.
     */
    public function forceDeleted(Payments $payments): void
    {
        //
    }
}
