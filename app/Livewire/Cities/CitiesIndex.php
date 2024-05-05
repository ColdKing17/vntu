<?php

namespace App\Livewire\Cities;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CitiesIndex extends Component
{
    public $min_population;
    public $max_population;
    public $date_of_establishment;

    public function delete(string $name)
    {
        DB::table('cities')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('cities')
            ->when($this->min_population, function ($query) {
                $query->where('population', '>=', $this->min_population);
            })
            ->when($this->max_population, function ($query) {
                $query->where('population', '<=', $this->max_population);
            })
            ->when($this->date_of_establishment, function ($query) {
                $query->where('date_of_establishment', $this->date_of_establishment);
            })->get();

        return view('livewire.cities.cities-index', compact('items'));
    }
}
