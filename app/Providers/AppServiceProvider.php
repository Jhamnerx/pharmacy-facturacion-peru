<?php

namespace App\Providers;

use App\Livewire\Admin\Comprobates\Pos\Order;
use App\Livewire\Admin\Comprobates\Pos\Steps\CartStep;
use App\Livewire\Admin\Comprobates\Pos\Steps\PayStep;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Livewire::component('admin.comprobates.pos.order', Order::class);
        // Livewire::component('admin.comprobates.pos.steps.cart-step', CartStep::class);
        // Livewire::component('admin.comprobates.pos.steps.pay-step', PayStep::class);
    }
}
