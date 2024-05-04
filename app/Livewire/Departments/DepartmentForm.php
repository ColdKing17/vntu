<?php

namespace App\Livewire\Departments;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepartmentForm extends Component
{
    public $name;
    public $office_address;
    public $phone_number;
    public $street_name;
    public $advertising_campaign_name;

    public Collection $streets;
    public Collection $advertisingCampaigns;

    public function mount($department = null)
    {
        $this->streets = DB::table('streets')->get();
        $this->advertisingCampaigns = DB::table('advertising_campaigns')->get();

        if ($department) {
            $this->name = $department->name;
            $this->office_address = $department->office_address;
            $this->phone_number = $department->phone_number;
            $this->street_name = $department->street_name;
            $this->advertising_campaign_name = $department->advertising_campaign_name;
        }
    }

    public function save()
    {
        $this->dispatch('save', [
            'department' => [
                'name' => $this->name,
                'office_address' => $this->office_address,
                'phone_number' => $this->phone_number,
            ],
            'department_office' => [
                'address' => $this->office_address,
                'street_name' => $this->street_name,
            ],
            'advertising_campaign_name' => $this->advertising_campaign_name,
        ]);
    }

    public function render()
    {
        return view('livewire.departments.department-form');
    }
}
