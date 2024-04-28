<?php

namespace App\Livewire\Requests;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestsIndex extends Component
{
    public function render()
    {
        $items = DB::table('requests')
            ->select(['requests.*', 'request_realtor.realtor_full_name AS realtor_full_name', 'payment_request.payment_date AS payment_date'])
            ->join('request_realtor', 'request_realtor.request_requirements', '=', 'requests.requirements')
            ->join('payment_request', 'payment_request.request_requirements', '=', 'requests.requirements')
            ->get();

        return view('livewire.requests.requests-index', compact('items'));
    }
}
