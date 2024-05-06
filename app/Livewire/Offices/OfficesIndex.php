<?php

namespace App\Livewire\Offices;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfficesIndex extends Component
{
    public $address;
    public $ticket_date;

    public Collection $tickets;

    public function mount()
    {
        $this->tickets = DB::table('tickets')->get();
    }

    public function delete(string $address, string $ticketDate)
    {
        if ($ticketDate) {
            DB::table('office_ticket')
                ->where('office_address', $address)
                ->where('ticket_date', $ticketDate)
                ->delete();
        }

        if (DB::table('office_ticket')->where('office_address', $address)->doesntExist()) {
            DB::table('offices')->where('address', $address)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('offices')
            ->leftJoin('office_ticket', 'office_ticket.office_address', '=', 'offices.address')
            ->when($this->address, function ($query) {
                $query->where('address', $this->address);
            })
            ->when($this->ticket_date, function ($query) {
                $query->where('ticket_date', $this->ticket_date);
            })->get();

        return view('livewire.offices.index', compact('items'));
    }
}
