<?php

namespace App\Livewire\Builders;

use Livewire\Component;

class BuilderForm extends Component
{
    public $name;
    public $email;
    public $experience;
    public $phone_number;

    public function mount($builder = null)
    {
        if ($builder) {
            $this->name = $builder->name;
            $this->email = $builder->email;
            $this->experience = $builder->experience;
            $this->phone_number = $builder->phone_number;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'email' => $this->email,
            'experience' => $this->experience,
            'phone_number' => $this->phone_number,
        ]);
    }

    public function render()
    {
        return view('livewire.builders.builder-form');
    }
}
