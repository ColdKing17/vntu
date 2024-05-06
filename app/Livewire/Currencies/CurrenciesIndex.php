<?php

namespace App\Livewire\Currencies;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrenciesIndex extends Component
{
    public $name;
    public $symbol;

    public function delete(string $symbol)
    {
        DB::table('currencies')->where('symbol', $symbol)->delete();
    }

    public function render()
    {
        $items = DB::table('currencies')
            ->when($this->name, function ($query) {
                $query->where('name', 'LIKE', "%{$this->name}%");
            })
            ->when($this->symbol, function ($query) {
                $query->where('symbol', $this->symbol);
            })->get();

        return view('livewire.currencies.index', compact('items'));
    }
}
