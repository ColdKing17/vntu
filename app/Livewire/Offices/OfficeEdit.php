<?php

namespace App\Livewire\Offices;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfficeEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $address;

    public function mount(string $address, string $ticket_date)
    {
        $this->address = DB::table('offices')->where('address', $address)->first();
        $this->address->ticket_date = $ticket_date;
    }

    public function create(array $data): void
    {
//        DB::table('offices')->where('address', $this->address->address)->update($data);
        $this->redirectRoute('offices.index');
    }

    public function render()
    {
        return view('livewire.offices.edit');
    }
}
