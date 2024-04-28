<?php

namespace App\Livewire\Streets;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StreetEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $street;

    public function mount(string $name)
    {
        $this->street = DB::table('streets')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('streets')->where('name', $this->street->name)->update($data);
        $this->redirectRoute('streets.index');
    }

    public function render()
    {
        return view('livewire.streets.street-edit');
    }
}
