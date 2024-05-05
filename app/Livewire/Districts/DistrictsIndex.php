<?php

namespace App\Livewire\Districts;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DistrictsIndex extends Component
{
    public $city_name;
    public $min_area;
    public $max_area;

    public Collection $cities;

    public function mount()
    {
        $this->cities = DB::table('cities')->get();
    }

    public function delete(string $districtName, string $cityName)
    {
        DB::table('district_city')
            ->where('district_name', $districtName)
            ->where('city_name', $cityName)
            ->delete();

        if (DB::table('district_city')->where('district_name', $districtName)->doesntExist()) {
            DB::table('districts')->where('name', $districtName)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('districts')
            ->select(['districts.*', 'district_city.city_name'])
            ->join('district_city', 'district_city.district_name', '=', 'districts.name')
            ->when($this->city_name, function ($query) {
                $query->where('city_name', $this->city_name);
            })
            ->when($this->min_area, function ($query) {
                $query->where('area', '>=', $this->min_area);
            })
            ->when($this->max_area, function ($query) {
                $query->where('area', '<=', $this->max_area);
            })
            ->get();

        return view('livewire.districts.districts-index', compact('items'));
    }
}
