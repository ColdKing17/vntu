<?php

namespace App\Livewire\Transactions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionsIndex extends Component
{
    public $category_name;
    public $subscription_date;

    public Collection $categories;
    public Collection $subscriptions;

    public function mount()
    {
        $this->categories = DB::table('categories')->get();
        $this->subscriptions = DB::table('subscriptions')->get();
    }

    public function delete(string $transactionId, string $receiver)
    {
        DB::table('transaction_receiver')
            ->where('transaction_id', $transactionId)
            ->where('receiver', $receiver)
            ->delete();

        if (DB::table('transaction_receiver')->where('transaction_id', $transactionId)->doesntExist()) {
            DB::table('transactions')->where('transaction_id', $transactionId)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('transactions')
            ->join('transaction_receiver', 'transaction_receiver.transaction_id', '=', 'transactions.transaction_id')
            ->join('subscription_category', 'subscription_category.subscription_date', '=', 'transactions.subscription_date')
            ->when($this->category_name, function ($query) {
                $query->where('category_name', $this->category_name);
            })
            ->when($this->subscription_date, function ($query) {
                $query->where('subscription_date', $this->subscription_date);
            })->get();

        return view('livewire.transactions.index', compact('items'));
    }
}
