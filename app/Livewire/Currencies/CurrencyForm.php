<?php

namespace App\Livewire\Currencies;

use Livewire\Component;

class CurrencyForm extends Component
{
    public $name;
    public $symbol;
    public $rate;
    public $rate_changed;

    public function mount($currency = null)
    {
        if ($currency) {
            $this->name = $currency->name;
            $this->symbol = $currency->symbol;
            $this->rate = $currency->rate;
            $this->rate_changed = $currency->rate_changed;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'symbol' => $this->symbol,
            'rate' => $this->rate,
            'rate_changed' => $this->rate_changed,
        ]);
    }

    public function render()
    {
        return view('livewire.currencies.form');
    }
}
