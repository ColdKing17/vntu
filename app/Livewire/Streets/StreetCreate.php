<?php

namespace App\Livewire\Streets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StreetCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('streets')->insert($data);
        $this->redirectRoute('streets.index');
    }

    public function render()
    {
        return view('livewire.streets.street-create');
    }
}
