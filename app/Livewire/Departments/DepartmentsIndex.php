<?php

namespace App\Livewire\Departments;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepartmentsIndex extends Component
{
    public $street_name;
    public $advertising_campaign_name;

    public Collection $streets;
    public Collection $advertisingCampaigns;

    public function mount()
    {
        $this->streets = DB::table('streets')->get();
        $this->advertisingCampaigns = DB::table('advertising_campaigns')->get();
    }

    public function delete(string $departmentName, string $advertisingCampaignName)
    {
        DB::table('department_advertising_campaign')
            ->where('department_name', $departmentName)
            ->where('advertising_campaign_name', $advertisingCampaignName)
            ->delete();

        if (DB::table('department_advertising_campaign')->where('department_name', $departmentName)->doesntExist()) {
            DB::table('departments')->where('name', $departmentName)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('departments')
            ->select(['departments.*', 'department_offices.street_name', 'department_advertising_campaign.advertising_campaign_name'])
            ->join('department_offices', 'department_offices.address', '=', 'departments.office_address')
            ->join('department_advertising_campaign', 'department_advertising_campaign.department_name', '=', 'departments.name')
            ->when($this->street_name, function ($query) {
                $query->where('street_name', $this->street_name);
            })
            ->when($this->advertising_campaign_name, function ($query) {
                $query->where('advertising_campaign_name', $this->advertising_campaign_name);
            })
            ->get();

        return view('livewire.departments.departments-index', compact('items'));
    }
}
