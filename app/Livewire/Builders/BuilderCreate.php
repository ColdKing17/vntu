<?php

namespace App\Livewire\Builders;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BuilderCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('builders')->insert($data);
        $this->redirectRoute('builders.index');
    }

    public function render()
    {
        return view('livewire.builders.builder-create');
    }
}
