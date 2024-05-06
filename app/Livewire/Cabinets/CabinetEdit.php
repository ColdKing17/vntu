<?php

namespace App\Livewire\Cabinets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CabinetEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $cabinet;

    public function mount(string $number)
    {
        $this->cabinet = DB::table('cabinets')->where('number', $number)->first();
    }

    public function create(array $data): void
    {
        DB::table('cabinets')->where('number', $this->cabinet->number)->update($data);
        $this->redirectRoute('cabinets.index');
    }

    public function render()
    {
        return view('livewire.cabinets.edit');
    }
}
