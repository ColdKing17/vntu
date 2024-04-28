<?php

namespace App\Livewire\Cities;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CityCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('cities')->insert($data);
        $this->redirectRoute('cities.index');
    }

    public function render()
    {
        return view('livewire.cities.city-create');
    }
}
