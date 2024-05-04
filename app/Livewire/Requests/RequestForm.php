<?php

namespace App\Livewire\Requests;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestForm extends Component
{
    public $requirements;
    public $budget;
    public $date;
    public $property_type;
    public $realtor_full_name;
    public $paymentData;

    public Collection $realtors;
    public Collection $payments;

    public function mount($request = null)
    {
        $this->realtors = DB::table('realtors')->get();
        $this->payments = DB::table('payments')->get();

        if ($request) {
            $this->requirements = $request->requirements;
            $this->budget = $request->budget;
            $this->date = $request->date;
            $this->property_type = $request->property_type;
            $this->realtor_full_name = $request->realtor_full_name;
            $this->paymentData = "$request->payment_date, $request->client_full_name";
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'request' => [
                'requirements' => $this->requirements,
                'budget' => $this->budget,
                'date' => $this->date,
                'property_type' => $this->property_type,
            ],
            'request_realtor' => [
                'request_requirements' => $this->requirements,
                'realtor_full_name' => $this->realtor_full_name,
            ],
            'payment_request' => [
                'request_requirements' => $this->requirements,
                'payment_date' => explode(', ', $this->paymentData)[0] ?? null,
                'client_full_name' => explode(', ', $this->paymentData)[1] ?? null,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.requests.request-form');
    }
}
