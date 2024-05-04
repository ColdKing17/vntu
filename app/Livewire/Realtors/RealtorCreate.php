<?php

namespace App\Livewire\Realtors;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealtorCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('realtors')->insert($data['realtor']);
        DB::table('relator_department_service')->insert([
            'realtor_full_name' => $data['realtor']['full_name'],
            'department_name' => $data['department_name'],
            'service_name' => $data['service_name'],
        ]);

        $this->redirectRoute('realtors.index');
    }

    public function render()
    {
        return view('livewire.realtors.realtor-create');
    }
}
