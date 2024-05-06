<?php

namespace App\Livewire\Workers;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WorkerCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        dd($data);
//        DB::table('workers')->insert($data);
        $this->redirectRoute('workers.index');
    }

    public function render()
    {
        return view('livewire.workers.create');
    }
}
