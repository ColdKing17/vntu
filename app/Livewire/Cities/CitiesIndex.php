<?php

namespace App\Livewire\Cities;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CitiesIndex extends Component
{
    public function delete(string $name)
    {
        DB::table('cities')->where('name', $name)->delete();
    }

    public function render()
    {
        return view('livewire.cities.cities-index', [
            'items' => DB::table('cities')->get(),
        ]);
    }
}
