<?php

namespace App\Livewire\Terminals;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TerminalForm extends Component
{
    public $internal_number;
    public $max_supported_amount;
    public $mall_address;
    public $city_name;

    public Collection $malls;
    public Collection $cities;

    public function mount($terminal = null)
    {
        $this->malls = DB::table('malls')->get();
        $this->cities = DB::table('cities')->get();

        if ($terminal) {
            $this->internal_number = $terminal->internal_number;
            $this->max_supported_amount = $terminal->max_supported_amount;
            $this->mall_address = $terminal->mall_address;
            $this->city_name = $terminal->city_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'terminal' => [
                'internal_number' => $this->internal_number,
                'max_supported_amount' => $this->max_supported_amount,
                'city_name' => $this->city_name,
            ],
            'terminal_mall' => [
                'terminal_internal_number' => $this->internal_number,
                'mall_address' => $this->mall_address,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.terminals.form');
    }
}
