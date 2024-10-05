<?php

namespace App\Livewire\Admin\Payments;

use Livewire\Component;
use App\Models\Payments;
use Livewire\Attributes\On;
use DragonCode\Contracts\Cashier\Config\Payment;

class Delete extends Component
{
    public Payments $pago;
    public $showModal = false;

    public function render()
    {
        return view('livewire.admin.payments.delete');
    }

    #[On('open-modal-delete-payment')]
    public function openModal(Payments $pago)
    {
        $this->pago = $pago;
        $this->showModal = true;
    }

    public function delete()
    {
        $this->pago->delete();

        $this->dispatch('payment-deleted');
    }
}
