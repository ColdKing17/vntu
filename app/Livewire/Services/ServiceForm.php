<?php

namespace App\Livewire\Services;

use Livewire\Component;

class ServiceForm extends Component
{
    public $name;
    public $description;
    public $price;
    public $term_of_provision;

    public function mount($service = null)
    {
        if ($service) {
            $this->name = $service->name;
            $this->description = $service->description;
            $this->price = $service->price;
            $this->term_of_provision = $service->term_of_provision;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'term_of_provision' => $this->term_of_provision,
        ]);
    }

    public function render()
    {
        return view('livewire.services.service-form');
    }
}
