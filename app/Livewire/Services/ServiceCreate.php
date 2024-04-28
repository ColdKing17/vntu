<?php

namespace App\Livewire\Services;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ServiceCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('services')->insert($data);
        $this->redirectRoute('services.index');
    }

    public function render()
    {
        return view('livewire.services.service-create');
    }
}
