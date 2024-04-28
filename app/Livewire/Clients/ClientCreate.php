<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        if (DB::table('clients')->where('full_name', $data['client']['full_name'])->exists()) {
            DB::table('clients')->where('full_name', $data['client']['full_name'])->update($data['client']);
        } else {
            DB::table('clients')->insert($data['client']);
        }

        if ($data['request_requirements']) {
            DB::table('request_client')->insert([
                'client_full_name' => $data['client']['full_name'],
                'request_requirements' => $data['request_requirements']
            ]);
        }

        $this->redirectRoute('clients.index');
    }

    public function render()
    {
        return view('livewire.clients.client-create');
    }
}
