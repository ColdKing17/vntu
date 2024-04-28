<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientForm extends Component
{
    public $full_name;
    public $phone_number;
    public $date_of_birth;
    public $request_requirements;
    public $city_name;

    public Collection $requests;
    public Collection $cities;

    public function mount($client = null)
    {
        $this->requests = DB::table('requests')->get();
        $this->cities = DB::table('cities')->get();

        if ($client) {
            $this->full_name = $client->full_name;
            $this->phone_number = $client->phone_number;
            $this->date_of_birth = $client->date_of_birth;
            $this->request_requirements = $client->request_requirements;
            $this->city_name=  $client->city_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'client' => [
                'full_name' => $this->full_name,
                'phone_number' => $this->phone_number,
                'date_of_birth' => $this->date_of_birth,
                'city_name' => $this->city_name,
            ],
            'request_requirements' => $this->request_requirements,
        ]);
    }

    public function render()
    {
        return view('livewire.clients.client-form');
    }
}
