<?php

namespace App\Livewire\Offices;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfficeForm extends Component
{
    public $address;
    public $country;
    public $city_name;
    public $workers_amount;
    public $ticket_date;

    public Collection $cities;
    public Collection $tickets;

    public function mount($office = null)
    {
        $this->cities = DB::table('cities')->get();
        $this->tickets = DB::table('tickets')->get();

        if ($office) {
            $this->address = $office->address;
            $this->country = $office->country;
            $this->city_name = $office->city_name;
            $this->workers_amount = $office->workers_amount;
            $this->ticket_date = $office->ticket_date;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'office' => [
                'address' => $this->address,
                'country' => $this->country,
                'city_name' => $this->city_name,
                'workers_amount' => $this->workers_amount,
            ],
            'office_ticket' => [
                'office_address' => $this->address,
                'ticket_date' => $this->ticket_date,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.offices.form');
    }
}
