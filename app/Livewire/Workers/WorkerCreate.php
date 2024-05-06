<?php

namespace App\Livewire\Workers;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WorkerCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('workers')->insert($data['worker']);
        DB::table('worker_cabinet_office')->insert($data['worker_cabinet_office']);

        $this->redirectRoute('workers.index');
    }

    public function render()
    {
        return view('livewire.workers.create');
    }
}
