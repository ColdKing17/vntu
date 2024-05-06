<?php

namespace App\Livewire\Categories;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategoryCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('categories')->insert($data);
        $this->redirectRoute('categories.index');
    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
