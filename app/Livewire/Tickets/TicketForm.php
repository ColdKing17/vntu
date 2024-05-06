<?php

namespace App\Livewire\Tickets;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketForm extends Component
{
    public $date;
    public $status;
    public $closed;
    public $payment_name;
    public $worker_full_name;

    public Collection $payments;
    public Collection $workers;

    public function mount($ticket = null)
    {
        $this->payments = DB::table('payments')->get();
        $this->workers = DB::table('workers')->get();

        if ($ticket) {
            $this->date = $ticket->date;
            $this->status = $ticket->status;
            $this->closed = $ticket->closed;
            $this->payment_name = $ticket->payment_name;
            $this->worker_full_name = $ticket->worker_full_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'ticket' => [
                'date' => $this->date,
                'status' => $this->status,
                'closed' => $this->closed,
                'payment_name' => $this->payment_name,
            ],
            'ticket_worker' => [
                'ticket_date' => $this->date,
                'worker_full_name' => $this->worker_full_name,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.tickets.form');
    }
}
