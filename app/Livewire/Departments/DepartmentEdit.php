<?php

namespace App\Livewire\Departments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepartmentEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $department;

    public function mount(string $departmentName, string $advertisingCampaignName)
    {
        $this->department = DB::table('departments')->where('name', $departmentName)->first();
        $this->department->advertising_campaign_name = $advertisingCampaignName;
        $this->department->street_name = DB::table('department_offices')->where('address', $this->department->office_address)->first()->street_name;

    }

    public function create(array $data): void
    {
        DB::table('department_offices')->where('address', $this->department->office_address)->delete();
        DB::table('department_offices')->where('address', $this->department->office_address)->insert($data['department_office']);

        DB::table('departments')->where('name', $this->department->name)->insert($data['department']);

        DB::table('department_advertising_campaign')
            ->where('department_name', $this->department->name)
            ->where('advertising_campaign_name', $this->department->advertising_campaign_name)
            ->insert([
                'department_name' => $data['department']['name'],
                'advertising_campaign_name' => $data['advertising_campaign_name'],
            ]);

        $this->redirectRoute('departments.index');
    }

    public function render()
    {
        return view('livewire.departments.department-edit');
    }
}
