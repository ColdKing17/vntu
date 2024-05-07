<?php

namespace App\Livewire\Clients;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientsV2Index extends Component
{
    public $request_requirements;
    public $payment_date;

    public Collection $requests;
    public Collection $payments;

    public function mount()
    {
        $this->requests = DB::table('requests')->get();
        $this->payments = DB::table('payments')->get()->unique('date');
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
            ->select(['clients.full_name', 'clients.phone_number', 'request_client.request_requirements AS request_requirements', 'payments.date as payment_date'])
            ->leftJoin('request_client', 'request_client.client_full_name', '=', 'clients.full_name')
            ->leftJoin('payments', 'payments.client_full_name', '=', 'clients.full_name')
            ->when($this->request_requirements, function ($query) {
                $query->where('request_requirements', $this->request_requirements);
            })
            ->when($this->payment_date, function ($query) {
                $query->where('payments.date', $this->payment_date);
            })
            ->get();

        return view('livewire.clients.clients-v2-index', compact('items'));
    }
}
