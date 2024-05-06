<?php

namespace App\Livewire\Currencies;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrencyCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('currencies')->insert($data);
        $this->redirectRoute('currencies.index');
    }

    public function render()
    {
        return view('livewire.currencies.create');
    }
}
