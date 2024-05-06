<?php

namespace App\Livewire\Categories;

use Livewire\Component;

class CategoryForm extends Component
{
    public $name;
    public $subscribers_amount;
    public $description;
    public $cashback;

    public function mount($category = null)
    {
        if ($category) {
            $this->name = $category->name;
            $this->subscribers_amount = $category->subscribers_amount;
            $this->description = $category->description;
            $this->cashback = $category->cashback;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'subscribers_amount' => $this->subscribers_amount,
            'description' => $this->description,
            'cashback' => $this->cashback,
        ]);
    }

    public function render()
    {
        return view('livewire.categories.form');
    }
}
