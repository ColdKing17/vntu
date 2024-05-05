<?php

namespace App\Livewire\Builders;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BuildersIndex extends Component
{
    public $min_experience;
    public $max_experience;
    public $phone_number;

    public function delete(string $name)
    {
        DB::table('builders')->where('name', $name)->delete();
    }

    public function render()
    {
        $items = DB::table('builders')
            ->when($this->min_experience, function ($query) {
                $query->where('experience', '>=', $this->min_experience);
            })
            ->when($this->max_experience, function ($query) {
                $query->where('experience', '<=', $this->max_experience);
            })
            ->when($this->phone_number, function ($query) {
                $query->where('phone_number', 'like', "%{$this->phone_number}%");
            })->get();

        return view('livewire.builders.builders-index', compact('items'));
    }
}
