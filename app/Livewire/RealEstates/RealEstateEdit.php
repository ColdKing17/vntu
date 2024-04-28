<?php

namespace App\Livewire\RealEstates;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealEstateEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $realEstate;

    public function mount(string $address)
    {
        $this->realEstate = DB::table('real_estates')->where('address', $address)->first();
    }

    public function create(array $data): void
    {
        DB::table('real_estates')->where('address', $this->realEstate->address)->update($data);
        $this->redirectRoute('real-estates.index');
    }

    public function render()
    {
        return view('livewire.real-estates.real-estate-edit');
    }
}
