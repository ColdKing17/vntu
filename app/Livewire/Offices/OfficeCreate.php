<?php

namespace App\Livewire\Offices;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfficeCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('offices')->insert($data['office']);

        if ($data['office_ticket']['ticket_date']) {
            DB::table('office_ticket')->insert($data['office_ticket']);
        }

        $this->redirectRoute('offices.index');
    }

    public function render()
    {
        return view('livewire.offices.create');
    }
}
