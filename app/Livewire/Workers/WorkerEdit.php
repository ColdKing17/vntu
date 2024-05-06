<?php

namespace App\Livewire\Workers;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WorkerEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $city;

    public function mount(string $full_name, string $cabinet_number, string $office_address)
    {
        $this->city = DB::table('workers')->where('full_name', $full_name)->first();
        $this->city->cabinet_number = $cabinet_number;
        $this->city->office_address = $office_address;
    }

    public function create(array $data): void
    {
//        DB::table('workers')->where('full_name', $this->city->full_name)->update($data);
        $this->redirectRoute('workers.index');
    }

    public function render()
    {
        return view('livewire.workers.edit');
    }
}
