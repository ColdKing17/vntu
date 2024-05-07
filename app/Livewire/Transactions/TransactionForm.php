<?php

namespace App\Livewire\Transactions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionForm extends Component
{
    public $transaction_id;
    public $card_number;
    public $receiver;
    public $category_name;
    public $subscription_date;

    public Collection $categories;
    public Collection $subscriptions;

    public function mount($transaction = null)
    {
        $this->categories = DB::table('categories')->get();
        $this->subscriptions = DB::table('subscriptions')->get();

        if ($transaction) {
            $this->transaction_id = $transaction->transaction_id;
            $this->card_number = $transaction->card_number;
            $this->receiver = $transaction->receiver;
            $this->category_name = $transaction->category_name;
            $this->subscription_date = $transaction->subscription_date;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'transaction' => [
                'transaction_id' => $this->transaction_id,
                'card_number' => $this->card_number,
                'subscription_date' => $this->subscription_date,
            ],
            'transaction_receiver' => [
                'transaction_id' => $this->transaction_id,
                'receiver' => $this->receiver,
            ],
            'subscription_category' => [
                'category_name' => $this->category_name,
                'subscription_date' => $this->subscription_date,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.transactions.form');
    }
}
