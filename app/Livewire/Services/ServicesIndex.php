<?php

namespace App\Livewire\Services;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ServicesIndex extends Component
{
    public $min_price;
    public $max_price;
    public $term_of_provision;

    public function delete(string $name)
    {
        DB::table('services')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('services')
            ->when($this->min_price, function ($query) {
                $query->where('price', '>=', $this->min_price);
            })
            ->when($this->max_price, function ($query) {
                $query->where('price', '<=', $this->max_price);
            })
            ->when($this->term_of_provision, function ($query) {
                $query->where('term_of_provision', $this->term_of_provision);
            })->get();

        return view('livewire.services.services-index', compact('items'));
    }
}
