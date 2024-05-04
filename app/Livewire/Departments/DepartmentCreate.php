<?php

namespace App\Livewire\Departments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepartmentCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('department_offices')->insert($data['department_office']);
        DB::table('departments')->insert($data['department']);
        DB::table('department_advertising_campaign')->insert([
            'department_name' => $data['department']['name'],
            'advertising_campaign_name' => $data['advertising_campaign_name'],
        ]);

        $this->redirectRoute('departments.index');
    }

    public function render()
    {
        return view('livewire.departments.department-create');
    }
}
