<?php

namespace App\Livewire\ResidentialComplexes;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResidentialComplexCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('residential_complexes')->insert($data);
        $this->redirectRoute('residential-complexes.index');
    }

    public function render()
    {
        return view('livewire.residential-complexes.residential-complex-create');
    }
}
