<?php

namespace App\Livewire\ResidentialComplexes;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResidentialComplexesIndex extends Component
{
    public function render()
    {
        $items = DB::table('residential_complexes')->get();

        return view('livewire.residential-complexes.residential-complexes-index', compact('items'));
    }
}
