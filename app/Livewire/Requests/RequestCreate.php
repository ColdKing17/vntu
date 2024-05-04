<?php

namespace App\Livewire\Requests;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('requests')->insert($data['request']);
        DB::table('request_realtor')->insert($data['request_realtor']);

        if ($data['payment_request']['payment_date']) {
            DB::table('payment_request')->insert($data['payment_request']);
        }

        $this->redirectRoute('requests.index');
    }

    public function render()
    {
        return view('livewire.requests.request-create');
    }
}
