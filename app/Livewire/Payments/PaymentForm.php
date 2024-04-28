<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentForm extends Component
{
    public $amount;
    public $date;
    public $payment_method;
    public $client_full_name;
    public $real_estate_address;

    public Collection $clients;
    public Collection $realEstates;

    public function mount($payment = null)
    {
        $this->clients = DB::table('clients')->get();
        $this->realEstates = DB::table('real_estates')->get();

        if ($payment) {
            $this->amount = $payment->amount;
            $this->date = $payment->date;
            $this->payment_method = $payment->payment_method;
            $this->client_full_name = $payment->client_full_name;
            $this->real_estate_address = $payment->real_estate_address;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'amount' => $this->amount,
            'date' => $this->date,
            'payment_method' => $this->payment_method,
            'client_full_name' => $this->client_full_name,
            'real_estate_address' => $this->real_estate_address,
        ]);
    }

    public function render()
    {
        return view('livewire.payments.payment-form');
    }
}
