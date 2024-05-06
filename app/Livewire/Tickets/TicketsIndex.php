<?php

namespace App\Livewire\Tickets;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketsIndex extends Component
{
    public $worker_full_name;
    public $payment_name;

    public Collection $workers;
    public Collection $payments;

    public function mount()
    {
        $this->workers = DB::table('workers')->get();
        $this->payments = DB::table('payments')->get();
    }

    public function delete(string $date, string $workerFullName)
    {
        DB::table('ticket_worker')
            ->where('ticket_date', $date)
            ->where('worker_full_name', $workerFullName)
            ->delete();

        if (DB::table('ticket_worker')->where('ticket_date', $date)->doesntExist()) {
            DB::table('tickets')->where('date', $date)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('tickets')
            ->join('ticket_worker', 'ticket_worker.ticket_date', '=', 'tickets.date')
            ->when($this->worker_full_name, function ($query) {
                $query->where('worker_full_name', $this->worker_full_name);
            })
            ->when($this->payment_name, function ($query) {
                $query->where('payment_name', $this->payment_name);
            })->get();

        return view('livewire.tickets.index', compact('items'));
    }
}
