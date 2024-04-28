<?php

namespace App\Livewire\RealEstates;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealEstateForm extends Component
{
    public $address;
    public $type;
    public $price;
    public $residential_complex_name;
    public $district_name;

    public Collection $residentialComplexes;
    public Collection $districts;

    public function mount($realEstate = null)
    {
        $this->residentialComplexes = DB::table('residential_complexes')->get();
        $this->districts = DB::table('districts')->get();

        if ($realEstate) {
            $this->address = $realEstate->address;
            $this->type = $realEstate->type;
            $this->price = $realEstate->price;
            $this->residential_complex_name = $realEstate->residential_complex_name;
            $this->district_name = $realEstate->district_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'address' => $this->address,
            'type' => $this->type,
            'price' => $this->price,
            'residential_complex_name' => $this->residential_complex_name,
            'district_name' => $this->district_name,
        ]);
    }

    public function render()
    {
        return view('livewire.real-estates.real-estate-form');
    }
}
