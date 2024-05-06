<?php

namespace App\Livewire\Cities;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CityEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $city;

    public function mount(string $name)
    {
        $this->city = DB::table('cities')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('cities')->where('name', $this->city->name)->update($data);
        $this->redirectRoute('cities.index');
    }

    public function render()
    {
        return view('livewire.cities.edit');
    }
}
