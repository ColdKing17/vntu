<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientForm extends Component
{
    public $full_name;
    public $phone;
    public $date_of_birth;
    public $transaction_id;
    public $payment_name;

    public Collection $transactions;
    public Collection $payments;

    public function mount($client = null)
    {
        $this->transactions = DB::table('transactions')->get();
        $this->payments = DB::table('payments')->get();

        if ($client) {
            $this->full_name = $client->full_name;
            $this->phone = $client->phone;
            $this->date_of_birth = $client->date_of_birth;
            $this->transaction_id = $client->transaction_id;
            $this->payment_name = $client->payment_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'client' => [
                'full_name' => $this->full_name,
                'phone' => $this->phone,
                'date_of_birth' => $this->date_of_birth,
            ],
            'client_transaction_payment' => [
                'client_full_name' => $this->full_name,
                'transaction_id' => $this->transaction_id,
                'payment_name' => $this->payment_name,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.clients.form');
    }
}
