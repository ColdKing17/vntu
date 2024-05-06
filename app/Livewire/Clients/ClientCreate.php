<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('clients')->insert($data['client']);

        if ($data['client_transaction_payment']['transaction_id'] && $data['client_transaction_payment']['payment_name']) {
            DB::table('client_transaction_payment')->insert($data['client_transaction_payment']);
        }

        $this->redirectRoute('clients.index');
    }

    public function render()
    {
        return view('livewire.clients.create');
    }
}
