<?php

namespace App\Livewire\Cities;

use Livewire\Component;

class CityForm extends Component
{
    public $name;
    public $description;
    public $area;
    public $population;
    public $date_of_establishment;

    public function mount($city = null)
    {
        if ($city) {
            $this->name = $city->name;
            $this->description = $city->description;
            $this->area = $city->area;
            $this->population = $city->population;
            $this->date_of_establishment = $city->date_of_establishment;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'description' => $this->description,
            'area' => $this->area,
            'population' => $this->population,
            'date_of_establishment' => $this->date_of_establishment,
        ]);
    }

    public function render()
    {
        return view('livewire.cities.city-form');
    }
}
