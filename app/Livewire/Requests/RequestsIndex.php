<?php

namespace App\Livewire\Requests;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestsIndex extends Component
{
    public $realtor_full_name;
    public $paymentData;

    public Collection $realtors;
    public Collection $payments;

    public function mount()
    {
        $this->realtors = DB::table('realtors')->get();
        $this->payments = DB::table('payments')->get();
    }

    public function delete(string $requestRequirements, string $realtorFullName, string $paymentDate, string $clientFullName)
    {
        if ($realtorFullName) {
            DB::table('request_realtor')
                ->where('realtor_full_name', $realtorFullName)
                ->where('request_requirements', $requestRequirements)
                ->delete();
        }

        if ($paymentDate && $clientFullName) {
            DB::table('payment_request')
                ->where('payment_date', $paymentDate)
                ->where('client_full_name', $clientFullName)
                ->where('request_requirements', $requestRequirements)
                ->delete();
        }

        if (DB::table('request_realtor')->where('request_requirements', $requestRequirements)->doesntExist()
            && DB::table('payment_request')->where('request_requirements', $requestRequirements)->doesntExist()) {
            DB::table('requests')->where('requirements', $requestRequirements)->delete();
        }
    }

    public function render()
    {
        $paymentDate = explode(', ', $this->paymentData)[0] ?? null;
        $clientFullName = explode(', ', $this->paymentData)[1] ?? null;

        $items = DB::table('requests')
            ->select(['requests.*', 'request_realtor.realtor_full_name AS realtor_full_name', 'payment_request.payment_date AS payment_date', 'payment_request.client_full_name AS client_full_name'])
            ->leftJoin('request_realtor', 'request_realtor.request_requirements', '=', 'requests.requirements')
            ->leftJoin('payment_request', 'payment_request.request_requirements', '=', 'requests.requirements')
            ->when($this->realtor_full_name, function ($query) {
                $query->where('realtor_full_name', $this->realtor_full_name);
            })
            ->when($paymentDate, function ($query) use ($paymentDate) {
                $query->where('payment_date', $paymentDate);
            })
            ->when($clientFullName, function ($query) use ($clientFullName) {
                $query->where('client_full_name', $clientFullName);
            })->get();

        return view('livewire.requests.requests-index', compact('items'));
    }
}
