<?php

namespace App\Livewire\Tickets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $ticket;

    public function mount(string $date, string $worker_full_name)
    {
        $this->ticket = DB::table('tickets')->where('date', $date)->first();
        $this->ticket->worker_full_name = $worker_full_name;
    }

    public function create(array $data): void
    {
        DB::table('tickets')->where('date', $this->ticket->date)->delete();

        DB::table('tickets')->insert($data['ticket']);
        DB::table('ticket_worker')->insert($data['ticket_worker']);

        $this->redirectRoute('tickets.index');
    }

    public function render()
    {
        return view('livewire.tickets.edit');
    }
}
