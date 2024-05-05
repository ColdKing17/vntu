<?php

namespace App\Livewire\ResidentialComplexes;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResidentialComplexesIndex extends Component
{
    public $builder_name;
    public $min_number_of_floors;
    public $max_number_of_floors;

    public Collection $builders;

    public function mount()
    {
        $this->builders = DB::table('builders')->get();
    }

    public function delete(string $address)
    {
        DB::table('residential_complexes')->where('address', $address)->delete();
    }

    public function render()
    {
        $items = DB::table('residential_complexes')
            ->when($this->min_number_of_floors, function ($query) {
                $query->where('number_of_floors', '>=', $this->min_number_of_floors);
            })
            ->when($this->max_number_of_floors, function ($query) {
                $query->where('number_of_floors', '<=', $this->max_number_of_floors);
            })
            ->when($this->builder_name, function ($query) {
                $query->where('builder_name', $this->builder_name);
            })->get();

        return view('livewire.residential-complexes.residential-complexes-index', compact('items'));
    }
}
