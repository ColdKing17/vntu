<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $client;

    public function mount(string $full_name)
    {
        $this->client = DB::table('clients')->where('full_name', $full_name)->first();
        $this->client->transaction_id = request('transaction_id');
        $this->client->payment_name = request('payment_name');
    }

    public function create(array $data): void
    {
        DB::table('clients')->where('full_name', $this->client->full_name)->delete();

        DB::table('clients')->insert($data['client']);

        if ($data['client_transaction_payment']['transaction_id'] && $data['client_transaction_payment']['payment_name']) {
            DB::table('client_transaction_payment')->insert($data['client_transaction_payment']);
        }

        $this->redirectRoute('clients.index');
    }

    public function render()
    {
        return view('livewire.clients.edit');
    }
}
