<?php

namespace App\Livewire\RealEstates;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealEstatesIndex extends Component
{
    public function render()
    {
        $items = DB::table('real_estates')->get();

        return view('livewire.real-estates.real-estates-index', compact('items'));
    }
}
