<?php

namespace App\Livewire\Builders;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BuilderEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $builder;

    public function mount(string $name)
    {
        $this->builder = DB::table('builders')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('builders')->where('name', $this->builder->name)->update($data);
        $this->redirectRoute('builders.index');
    }

    public function render()
    {
        return view('livewire.builders.builder-edit');
    }
}
