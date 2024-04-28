<?php

namespace App\Livewire\ResidentialComplexes;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResidentialComplexForm extends Component
{
    public $name;
    public $description;
    public $address;
    public $builder_name;
    public $number_of_floors;

    public Collection $builders;

    public function mount($residentialComplex = null)
    {
        $this->builders = DB::table('builders')->get();

        if ($residentialComplex) {
            $this->name = $residentialComplex->name;
            $this->description = $residentialComplex->description;
            $this->address = $residentialComplex->address;
            $this->builder_name = $residentialComplex->builder_name;
            $this->number_of_floors = $residentialComplex->number_of_floors;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'builder_name' => $this->builder_name,
            'number_of_floors' => $this->number_of_floors,
        ]);
    }

    public function render()
    {
        return view('livewire.residential-complexes.residential-complex-form');
    }
}
