<?php

namespace App\Livewire\Categories;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategoriesIndex extends Component
{
    public $description;
    public $min_cashback;
    public $max_cashback;

    public function delete(string $name)
    {
        DB::table('categories')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('categories')
            ->when($this->min_cashback, function ($query) {
                $query->where('cashback', '>=', $this->min_cashback);
            })
            ->when($this->max_cashback, function ($query) {
                $query->where('cashback', '<=', $this->max_cashback);
            })
            ->when($this->description, function ($query) {
                $query->where('description', 'LIKE', "%{$this->description}%");
            })->get();

        return view('livewire.categories.index', compact('items'));
    }
}
