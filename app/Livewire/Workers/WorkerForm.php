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

    public function mount($worker = null)
    {
        $this->cabinets = DB::table('cabinets')->get();
        $this->offices = DB::table('offices')->get();

        if ($worker) {
            $this->full_name = $worker->full_name;
            $this->internal_number = $worker->internal_number;
            $this->email = $worker->email;
            $this->experience = $worker->experience;
            $this->cabinet_number = $worker->cabinet_number;
            $this->office_address = $worker->office_address;
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
