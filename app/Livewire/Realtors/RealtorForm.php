<?php

namespace App\Livewire\Realtors;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealtorForm extends Component
{
    public $full_name;
    public $email;
    public $work_experience;
    public $department_name;
    public $service_name;

    public Collection $departments;
    public Collection $services;

    public function mount($realtor = null)
    {
        $this->departments = DB::table('departments')->get();
        $this->services = DB::table('services')->get();

        if ($realtor) {
            $this->full_name = $realtor->full_name;
            $this->email = $realtor->email;
            $this->work_experience = $realtor->work_experience;
            $this->department_name = $realtor->department_name;
            $this->service_name = $realtor->service_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'realtor' => [
                'full_name' => $this->full_name,
                'email' => $this->email,
                'work_experience' => $this->work_experience,
            ],
            'department_name' => $this->department_name,
            'service_name' => $this->service_name,
        ]);
    }

    public function render()
    {
        return view('livewire.realtors.realtor-form');
    }
}
