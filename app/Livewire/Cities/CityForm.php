<?php

namespace App\Livewire\Cities;

use Livewire\Component;

class CityForm extends Component
{
    public $name;
    public $people_amount;
    public $terminals_amount;
    public $square;

    public function mount($city = null)
    {
        if ($city) {
            $this->name = $city->name;
            $this->people_amount = $city->people_amount;
            $this->terminals_amount = $city->terminals_amount;
            $this->square = $city->square;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'people_amount' => $this->people_amount,
            'terminals_amount' => $this->terminals_amount,
            'square' => $this->square,
        ]);
    }

    public function render()
    {
        return view('livewire.cities.form');
    }
}
