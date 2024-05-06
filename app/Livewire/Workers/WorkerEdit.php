<?php

namespace App\Livewire\Workers;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WorkerEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $worker;

    public function mount(string $full_name, string $cabinet_number, string $office_address)
    {
        $this->worker = DB::table('workers')->where('full_name', $full_name)->first();
        $this->worker->cabinet_number = $cabinet_number;
        $this->worker->office_address = $office_address;
    }

    public function create(array $data): void
    {
//        DB::table('workers')->where('full_name', $this->worker->full_name)->update($data);
        $this->redirectRoute('workers.index');
    }

    public function render()
    {
        return view('livewire.workers.edit');
    }
}
