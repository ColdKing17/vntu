<?php

namespace App\Livewire\Cities;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CitiesIndex extends Component
{
    public $name;
    public $min_square;
    public $max_square;

    public function delete(string $name)
    {
        DB::table('cities')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('cities')
            ->when($this->min_square, function ($query) {
                $query->where('square', '>=', $this->min_square);
            })
            ->when($this->max_square, function ($query) {
                $query->where('square', '<=', $this->max_square);
            })
            ->when($this->name, function ($query) {
                $query->where('name', 'LIKE', "%{$this->name}%");
            })->get();

        return view('livewire.cities.index', compact('items'));
    }
}
