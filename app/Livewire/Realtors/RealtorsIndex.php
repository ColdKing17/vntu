<?php

namespace App\Livewire\Realtors;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealtorsIndex extends Component
{
    public function render()
    {
        $items = DB::table('realtors')
            ->join('relator_department_service', 'relator_department_service.relator_full_name', '=', 'realtors.full_name')
            ->get();

        return view('livewire.realtors.realtors-index', compact('items'));
    }
}
