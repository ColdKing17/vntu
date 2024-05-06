<?php

namespace App\Livewire\Terminals;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TerminalsIndex extends Component
{
    public $mall_address;
    public $city_name;

    public Collection $malls;
    public Collection $cities;

    public function mount()
    {
        $this->malls = DB::table('malls')->get();
        $this->cities = DB::table('cities')->get();
    }

    public function delete(string $internal_number, string $mall_address)
    {
        DB::table('terminal_mall')
            ->where('terminal_internal_number', $internal_number)
            ->where('mall_address', $mall_address)
            ->delete();

        if (DB::table('terminal_mall')->where('terminal_internal_number', $internal_number)->doesntExist()) {
            DB::table('terminals')->where('internal_number', $internal_number)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('terminals')
            ->join('terminal_mall', 'terminal_mall.terminal_internal_number', '=', 'terminals.internal_number')
            ->when($this->mall_address, function ($query) {
                $query->where('mall_address', $this->mall_address);
            })
            ->when($this->city_name, function ($query) {
                $query->where('city_name', $this->city_name);
            })->get();

        return view('livewire.terminals.index', compact('items'));
    }
}
