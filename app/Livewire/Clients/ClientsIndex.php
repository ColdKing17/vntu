<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientsIndex extends Component
{
    public $transaction_id;
    public $payment_name;

    public Collection $transactions;
    public Collection $payments;

    public function mount()
    {
        $this->transactions = DB::table('transactions')->get();
        $this->payments = DB::table('payments')->get();
    }

    public function delete(string $fullName, string $transactionId, string $paymentName)
    {
        if ($transactionId && $paymentName) {
            DB::table('client_transaction_payment')
                ->where('client_full_name', $fullName)
                ->where('transaction_id', $transactionId)
                ->where('payment_name', $paymentName)
                ->delete();
        }

        if (DB::table('client_transaction_payment')->where('client_full_name', $fullName)->doesntExist()) {
            DB::table('clients')->where('full_name', $fullName)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('clients')
            ->leftJoin('client_transaction_payment', 'client_transaction_payment.client_full_name', '=', 'clients.full_name')
            ->when($this->transaction_id, function ($query) {
                $query->where('transaction_id', $this->transaction_id);
            })
            ->when($this->payment_name, function ($query) {
                $query->where('payment_name', $this->payment_name);
            })->get();

        return view('livewire.clients.index', compact('items'));
    }
}
