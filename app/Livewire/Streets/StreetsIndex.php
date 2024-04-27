<?php

namespace App\Livewire\Streets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StreetsIndex extends Component
{
    public function render()
    {
        return view('livewire.streets.streets-index', [
            'items' => DB::table('streets')->get(),
        ]);
    }
}
