<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientPaymentIndex extends Component
{
    public $min_commission;
    public $max_commission;
    public $payment_name;

    public Collection $payments;

    public function mount()
    {
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
            ->leftJoin('payments', 'payments.name', '=', 'client_transaction_payment.payment_name')
            ->when($this->min_commission, function ($query) {
                $query->where('commission', '>=', $this->min_commission);
            })
            ->when($this->max_commission, function ($query) {
                $query->where('commission', '<=', $this->max_commission);
            })
            ->when($this->payment_name, function ($query) {
                $query->where('payment_name', $this->payment_name);
            })->get();

        return view('livewire.clients.index2', compact('items'));
    }
}
