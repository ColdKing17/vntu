<?php

namespace App\Livewire\Workers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WorkerForm extends Component
{
    public $full_name;
    public $internal_number;
    public $email;
    public $experience;
    public $cabinet_number;
    public $office_address;

    public Collection $cabinets;
    public Collection $offices;

    public function mount($city = null)
    {
        $this->cabinets = DB::table('cabinets')->get();
        $this->offices = DB::table('offices')->get();

        if ($city) {
            $this->full_name = $city->full_name;
            $this->internal_number = $city->internal_number;
            $this->email = $city->email;
            $this->experience = $city->experience;
            $this->cabinet_number = $city->cabinet_number;
            $this->office_address = $city->office_address;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'worker' => [
                'full_name' => $this->full_name,
                'internal_number' => $this->internal_number,
                'email' => $this->email,
                'experience' => $this->experience,
            ],
            'worker_cabinet_office' => [
                'worker_full_name' => $this->full_name,
                'cabinet_number' => $this->cabinet_number,
                'office_address' => $this->office_address,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.workers.form');
    }
}
