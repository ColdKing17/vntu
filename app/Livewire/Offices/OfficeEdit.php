<?php

namespace App\Livewire\Offices;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfficeEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $office;

    public function mount(string $address)
    {
        $this->office = DB::table('offices')->where('address', $address)->first();
        $this->office->ticket_date = request('ticket_date');
    }

    public function create(array $data): void
    {
        DB::table('offices')->where('address', $this->office->address)->delete();
        DB::table('offices')->insert($data['office']);

        if ($data['office_ticket']['ticket_date']) {
            DB::table('office_ticket')->insert($data['office_ticket']);
        }

        $this->redirectRoute('offices.index');
    }

    public function render()
    {
        return view('livewire.offices.edit');
    }
}
