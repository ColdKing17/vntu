<?php

namespace App\Livewire\Offices;

use Livewire\Component;

class OfficeCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        dd($data);
//        DB::table('offices')->insert($data);
        $this->redirectRoute('offices.index');
    }

    public function render()
    {
        return view('livewire.offices.create');
    }
}
