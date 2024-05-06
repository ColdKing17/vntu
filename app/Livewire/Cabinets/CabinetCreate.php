<?php

namespace App\Livewire\Cabinets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CabinetCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('cabinets')->insert($data);
        $this->redirectRoute('cabinets.index');
    }

    public function render()
    {
        return view('livewire.cabinets.create');
    }
}
