<?php

namespace App\Livewire\Transactions;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $transaction;

    public function mount(string $transaction_id, string $receiver)
    {
        $this->transaction = DB::table('transactions')->where('transaction_id', $transaction_id)->first();
        $this->transaction->receiver = $receiver;
        $this->transaction->category_name = DB::table('subscription_category')->where('subscription_date', $this->transaction->subscription_date)->first()->category_name;
    }

    public function create(array $data): void
    {
        DB::table('transactions')->where('transaction_id', $this->transaction->transaction_id)->delete();
        DB::table('subscription_category')->where('subscription_date', $this->transaction->subscription_date)->delete();

        DB::table('transactions')->insert($data['transaction']);
        DB::table('transaction_receiver')->insert($data['transaction_receiver']);
        DB::table('subscription_category')->insert($data['subscription_category']);

        $this->redirectRoute('transactions.index');
    }

    public function render()
    {
        return view('livewire.transactions.edit');
    }
}
