<?php

namespace App\Livewire\Services;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ServiceEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $service;

    public function mount(string $name)
    {
        $this->service = DB::table('services')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('services')->where('name', $this->service->name)->update($data);
        $this->redirectRoute('services.index');
    }

    public function render()
    {
        return view('livewire.services.service-edit');
    }
}
