<?php

namespace App\Livewire\Cities;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CitiesIndex extends Component
{
    public function render()
    {
        return view('livewire.cities.cities-index', [
            'items' => DB::table('cities')->get(),
        ]);
    }
}
