<?php

namespace App\Livewire\Tickets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('tickets')->insert($data['ticket']);
        DB::table('ticket_worker')->insert($data['ticket_worker']);

        $this->redirectRoute('tickets.index');
    }

    public function render()
    {
        return view('livewire.tickets.create');
    }
}
