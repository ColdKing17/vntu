<?php

namespace App\Livewire\Builders;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BuildersIndex extends Component
{
    public function render()
    {
        return view('livewire.builders.builders-index', [
            'items' => DB::table('builders')->get(),
        ]);
    }
}
