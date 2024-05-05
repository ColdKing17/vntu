<?php

namespace App\Livewire\RealEstates;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealEstatesIndex extends Component
{
    public $residential_complex_name;
    public $district_name;

    public Collection $residentialComplexes;
    public Collection $districts;

    public function mount()
    {
        $this->residentialComplexes = DB::table('residential_complexes')->get();
        $this->districts = DB::table('districts')->get();
    }

    public function delete(string $address)
    {
        DB::table('real_estates')->where('address', $address)->delete();
    }

    public function render()
    {
        $items = DB::table('real_estates')
            ->when($this->residential_complex_name, function ($query) {
                $query->where('residential_complex_name', $this->residential_complex_name);
            })
            ->when($this->district_name, function ($query) {
                $query->where('district_name', $this->district_name);
            })->get();

        return view('livewire.real-estates.real-estates-index', compact('items'));
    }
}
