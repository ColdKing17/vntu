<?php

namespace App\Livewire\Districts;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DistrictForm extends Component
{
    public $name;
    public $description;
    public $rating;
    public $city_name;
    public $area;

    public Collection $cities;

    public function mount($district = null)
    {
        $this->cities = DB::table('cities')->get();

        if ($district) {
            $this->name = $district->name;
            $this->description = $district->description;
            $this->rating = $district->rating;
            $this->city_name = $district->city_name;
            $this->area = $district->area;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'district' => [
                'name' => $this->name,
                'description' => $this->description,
                'rating' => $this->rating,
                'area' => $this->area,
            ],
            'city_name' => $this->city_name,
        ]);
    }

    public function render()
    {
        return view('livewire.districts.district-form');
    }
}
