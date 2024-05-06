<?php

namespace App\Livewire\Cabinets;

use Livewire\Component;

class CabinetForm extends Component
{
    public $number;
    public $workers_amount;
    public $floor;
    public $square;
    public $has_fax;

    public function mount($cabinet = null)
    {
        if ($cabinet) {
            $this->number = $cabinet->number;
            $this->workers_amount = $cabinet->workers_amount;
            $this->floor = $cabinet->floor;
            $this->square = $cabinet->square;
            $this->has_fax = $cabinet->has_fax;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'number' => $this->number,
            'workers_amount' => $this->workers_amount,
            'floor' => $this->floor,
            'square' => $this->square,
            'has_fax' => $this->has_fax,
        ]);
    }

    public function render()
    {
        return view('livewire.cabinets.form');
    }
}
