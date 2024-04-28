<?php

namespace App\Livewire\Streets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StreetsIndex extends Component
{
    public function delete(string $name)
    {
        DB::table('streets')->where('name', $name)->delete();
    }

    public function render()
    {
        return view('livewire.streets.streets-index', [
            'items' => DB::table('streets')->get(),
        ]);
    }
}
