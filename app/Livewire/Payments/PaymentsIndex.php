<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentsIndex extends Component
{
    public $client_full_name;
    public $real_estate_address;

    public Collection $clients;
    public Collection $realEstates;

    public function mount()
    {
        $this->clients = DB::table('clients')->get();
        $this->realEstates = DB::table('real_estates')->get();
    }

    public function delete(string $date, string $clientFullName, string $realEstateAddress)
    {
        DB::table('payments')
            ->where('date', $date)
            ->where('client_full_name', $clientFullName)
            ->where('real_estate_address', $realEstateAddress)
            ->delete();
    }

    public function render()
    {
        $items = DB::table('payments')
            ->when($this->client_full_name, function ($query) {
                $query->where('client_full_name', $this->client_full_name);
            })
            ->when($this->real_estate_address, function ($query) {
                $query->where('real_estate_address', $this->real_estate_address);
            })->get();

        return view('livewire.payments.payments-index', compact('items'));
    }
}
