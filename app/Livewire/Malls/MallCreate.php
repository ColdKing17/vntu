<?php

namespace App\Livewire\Malls;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MallCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('malls')->insert($data);
        $this->redirectRoute('malls.index');
    }

    public function render()
    {
        return view('livewire.malls.create');
    }
}
