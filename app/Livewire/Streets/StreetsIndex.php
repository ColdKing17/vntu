<?php

namespace App\Livewire\Streets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StreetsIndex extends Component
{
    public $road_surface;
    public $type_of_building;

    public function delete(string $name)
    {
        DB::table('streets')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('streets')
            ->when($this->road_surface, function ($query) {
                $query->where('road_surface', 'like', "%{$this->road_surface}%");
            })
            ->when($this->type_of_building, function ($query) {
                $query->where('type_of_building', 'like', "%{$this->type_of_building}%");
            })->get();

        return view('livewire.streets.streets-index', compact('items'));
    }
}
