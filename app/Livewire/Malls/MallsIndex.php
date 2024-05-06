<?php

namespace App\Livewire\Malls;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MallsIndex extends Component
{
    public $address;
    public $district;

    public function delete(string $address)
    {
        DB::table('malls')->where('address', $address)->delete();
    }

    public function render()
    {
        $items = DB::table('malls')
            ->when($this->district, function ($query) {
                $query->where('district', 'LIKE', "%{$this->district}%");
            })
            ->when($this->address, function ($query) {
                $query->where('address', 'LIKE', "%{$this->address}%");
            })->get();

        return view('livewire.malls.index', compact('items'));
    }
}
