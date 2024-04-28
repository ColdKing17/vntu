<?php

namespace App\Livewire\Builders;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BuildersIndex extends Component
{
    public function delete(string $name)
    {
        DB::table('builders')->where('name', $name)->delete();
    }

    public function render()
    {
        return view('livewire.builders.builders-index', [
            'items' => DB::table('builders')->get(),
        ]);
    }
}
