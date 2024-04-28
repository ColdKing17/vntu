<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientsIndex extends Component
{
    public function render()
    {
        $items = DB::table('clients')
            ->select(['clients.*', 'request_client.request_requirements AS request_requirements'])
            ->join('request_client', 'request_client.client_full_name', '=', 'clients.full_name')
            ->get();

        return view('livewire.clients.clients-index', compact('items'));
    }
}
