<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientsIndex extends Component
{
    public $request_requirements;
    public $city_name;

    public Collection $requests;
    public Collection $cities;

    public function mount()
    {
        $this->requests = DB::table('requests')->get();
        $this->cities = DB::table('cities')->get();
    }

    public function delete(string $clientFullName, string $requestRequirements)
    {
        DB::table('request_client')
            ->where('client_full_name', $clientFullName)
            ->where('request_requirements', $requestRequirements)
            ->delete();

        if (DB::table('request_client')->where('client_full_name', $clientFullName)->doesntExist()) {
            DB::table('clients')->where('full_name', $clientFullName)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('clients')
            ->select(['clients.*', 'request_client.request_requirements AS request_requirements'])
            ->leftJoin('request_client', 'request_client.client_full_name', '=', 'clients.full_name')
            ->when($this->request_requirements, function ($query) {
                $query->where('request_requirements', $this->request_requirements);
            })
            ->when($this->city_name, function ($query) {
                $query->where('city_name', $this->city_name);
            })
            ->get();

        return view('livewire.clients.clients-index', compact('items'));
    }
}
