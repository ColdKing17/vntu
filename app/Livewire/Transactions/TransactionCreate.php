<?php

namespace App\Livewire\Transactions;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('transactions')->insert($data['transaction']);
        DB::table('transaction_receiver')->insert($data['transaction_receiver']);
        DB::table('subscription_category')->insert($data['subscription_category']);

        $this->redirectRoute('transactions.index');
    }

    public function render()
    {
        return view('livewire.transactions.create');
    }
}
