<?php

namespace App\Livewire\Currencies;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrencyEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $currency;

    public function mount(string $symbol)
    {
        $this->currency = DB::table('currencies')->where('symbol', $symbol)->first();
    }

    public function create(array $data): void
    {
        DB::table('currencies')->where('symbol', $this->currency->symbol)->update($data);
        $this->redirectRoute('currencies.index');
    }

    public function render()
    {
        return view('livewire.currencies.edit');
    }
}
