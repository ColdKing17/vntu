<?php

namespace App\Livewire\Requests;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $request;

    public function mount(string $requirements, string $realtorFullName)
    {
        $this->request = DB::table('requests')->where('requirements', $requirements)->first();
        $this->request->realtor_full_name = $realtorFullName;
        $this->request->payment_date = request('paymentDate');
        $this->request->client_full_name = request('clientFullName');
    }

    public function create(array $data): void
    {
        DB::table('requests')->where('requirements', $this->request->requirements)->delete();
        DB::table('requests')->insert($data['request']);

        DB::table('request_realtor')->insert($data['request_realtor']);

        if ($data['payment_request']['payment_date']) {
            DB::table('payment_request')->insert($data['payment_request']);
        }

        $this->redirectRoute('requests.index');
    }

    public function render()
    {
        return view('livewire.requests.request-edit');
    }
}
