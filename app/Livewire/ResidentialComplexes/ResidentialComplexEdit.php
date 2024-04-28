<?php

namespace App\Livewire\ResidentialComplexes;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResidentialComplexEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $residentialComplex;

    public function mount(string $name)
    {
        $this->residentialComplex = DB::table('residential_complexes')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('residential_complexes')->where('name', $this->residentialComplex->name)->update($data);
        $this->redirectRoute('residential-complexes.index');
    }

    public function render()
    {
        return view('livewire.residential-complexes.residential-complex-edit');
    }
}
