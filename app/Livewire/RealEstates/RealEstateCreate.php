<?php

namespace App\Livewire\RealEstates;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealEstateCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('real_estates')->insert($data);
        $this->redirectRoute('real-estates.index');
    }

    public function render()
    {
        return view('livewire.real-estates.real-estate-create');
    }
}
