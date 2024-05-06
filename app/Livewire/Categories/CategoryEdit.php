<?php

namespace App\Livewire\Categories;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategoryEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $category;

    public function mount(string $name)
    {
        $this->category = DB::table('categories')->where('name', $name)->first();
    }

    public function create(array $data): void
    {
        DB::table('categories')->where('name', $this->category->name)->update($data);
        $this->redirectRoute('categories.index');
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
