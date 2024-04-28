<?php

namespace App\Livewire\Requests;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestsIndex extends Component
{
    public function delete(string $requestRequirements, string $realtorFullName, string $paymentDate)
    {
        if ($realtorFullName) {
            DB::table('request_realtor')
                ->where('realtor_full_name', $realtorFullName)
                ->where('request_requirements', $requestRequirements)
                ->delete();
        }

        if ($paymentDate) {
            DB::table('payment_request')
                ->where('payment_date', $paymentDate)
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
        $items = DB::table('requests')
            ->select(['requests.*', 'request_realtor.realtor_full_name AS realtor_full_name', 'payment_request.payment_date AS payment_date', 'payment_request.client_full_name AS client_full_name'])
            ->leftJoin('request_realtor', 'request_realtor.request_requirements', '=', 'requests.requirements')
            ->leftJoin('payment_request', 'payment_request.request_requirements', '=', 'requests.requirements')
            ->get();

        return view('livewire.requests.requests-index', compact('items'));
    }
}
