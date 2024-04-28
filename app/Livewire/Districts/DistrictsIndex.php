<?php

namespace App\Livewire\Districts;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DistrictsIndex extends Component
{
    public function render()
    {
        $items = DB::table('districts')
            ->select(['districts.*', 'district_city.city_name'])
            ->join('district_city', 'district_city.district_name', '=', 'districts.name')
            ->get();

        return view('livewire.districts.districts-index', compact('items'));
    }
}
