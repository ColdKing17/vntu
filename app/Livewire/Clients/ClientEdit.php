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
        $this->client->request_requirements = request()->get('request_requirements');
    }

    public function create(array $data): void
    {
        DB::table('clients')->where('full_name', $this->client->full_name)->update($data['client']);

        $requestClientData = ['client_full_name' => $data['client']['full_name'], 'request_requirements' => $data['request_requirements']];
        if ($data['request_requirements']) {
            if ($this->client->request_requirements) {
                DB::table('request_client')
                    ->where('client_full_name', $this->client->full_name)
                    ->where('request_requirements', $this->client->request_requirements)
                    ->update($requestClientData);
            } else {
                DB::table('request_client')->insert($requestClientData);
            }
        } else {
            DB::table('request_client')
                ->where('client_full_name', $this->client->full_name)
                ->where('request_requirements', $this->client->request_requirements)
                ->delete();
        }

        $this->redirectRoute('clients.index');
    }

    public function render()
    {
        return view('livewire.clients.client-edit');
    }
}
