<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('payments')->insert($data);
        $this->redirectRoute('payments.index');
    }

    public function render()
    {
        return view('livewire.payments.payment-create');
    }
}
