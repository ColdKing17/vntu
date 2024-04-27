<?php

namespace App\Livewire\Services;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ServicesIndex extends Component
{
    public function render()
    {
        return view('livewire.services.services-index', [
            'items' => DB::table('services')->get(),
        ]);
    }
}
