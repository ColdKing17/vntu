<?php

namespace App\Livewire\Cabinets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CabinetsIndex extends Component
{
    public $has_fax = '';
    public $min_square;
    public $max_square;

    public function delete(string $number)
    {
        DB::table('cabinets')->where('number', $number)->delete();
    }

    public function render()
    {
        $items = DB::table('cabinets')
            ->when($this->min_square, function ($query) {
                $query->where('square', '>=', $this->min_square);
            })
            ->when($this->max_square, function ($query) {
                $query->where('square', '<=', $this->max_square);
            })
            ->when(($this->has_fax !== ''), function ($query) {
                $query->where('has_fax', $this->has_fax);
            })->get();

        return view('livewire.cabinets.index', compact('items'));
    }
}
