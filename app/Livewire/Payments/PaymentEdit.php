<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $payment;

    public function mount(string $date, string $client_full_name, string $real_estate_address)
    {
        $this->payment = DB::table('payments')->where('date', $date)->where('client_full_name', $client_full_name)->where('real_estate_address', $real_estate_address)->first();
    }

    public function create(array $data): void
    {
        DB::table('payments')
            ->where('date', $this->payment->date)
            ->where('client_full_name', $this->payment->client_full_name)
            ->where('real_estate_address', $this->payment->real_estate_address)
            ->update($data);

        $this->redirectRoute('payments.index');
    }

    public function render()
    {
        return view('livewire.payments.payment-edit');
    }
}
