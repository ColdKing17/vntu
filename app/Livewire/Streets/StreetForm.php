<?php

namespace App\Livewire\Streets;

use Livewire\Component;

class StreetForm extends Component
{
    public $name;
    public $length;
    public $road_surface;
    public $type_of_building;

    public function mount($street = null)
    {
        if ($street) {
            $this->name = $street->name;
            $this->length = $street->length;
            $this->road_surface = $street->road_surface;
            $this->type_of_building = $street->type_of_building;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'length' => $this->length,
            'road_surface' => $this->road_surface,
            'type_of_building' => $this->type_of_building,
        ]);
    }

    public function render()
    {
        return view('livewire.streets.street-form');
    }
}
