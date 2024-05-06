<?php

namespace App\Livewire\Malls;

use Livewire\Component;

class MallForm extends Component
{
    public $name;
    public $address;
    public $square;
    public $superficiality;
    public $district;

    public function mount($mall = null)
    {
        if ($mall) {
            $this->name = $mall->name;
            $this->address = $mall->address;
            $this->square = $mall->square;
            $this->superficiality = $mall->superficiality;
            $this->district = $mall->district;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'address' => $this->address,
            'square' => $this->square,
            'superficiality' => $this->superficiality,
            'district' => $this->district,
        ]);
    }

    public function render()
    {
        return view('livewire.malls.form');
    }
}
