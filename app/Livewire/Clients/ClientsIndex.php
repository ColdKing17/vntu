<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientsIndex extends Component
{
    public function render()
    {
        return view('livewire.clients.clients-index', [
            'items' => DB::table('clients')->get(),
        ]);
    }
}
