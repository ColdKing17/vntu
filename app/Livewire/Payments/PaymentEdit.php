<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $payment;

    public function mount(string $name, string $terminal_internal_number)
    {
        $this->payment = DB::table('payments')->where('name', $name)->first();
        $this->payment->terminal_internal_number = $terminal_internal_number;
    }

    public function create(array $data): void
    {
        DB::table('payments')->where('name', $this->payment->name)->delete();

        DB::table('payments')->insert($data['payment']);
        DB::table('payment_terminal')->insert($data['payment_terminal']);

        $this->redirectRoute('payments.index');
    }

    public function render()
    {
        return view('livewire.payments.edit');
    }
}
