<?php

namespace App\Livewire\Departments;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepartmentsIndex extends Component
{
    public function render()
    {
        $items = DB::table('departments')
            ->select(['departments.*', 'department_offices.street_name', 'department_advertising_campaign.advertising_campaign_name'])
            ->join('department_offices', 'department_offices.address', '=', 'departments.office_address')
            ->join('department_advertising_campaign', 'department_advertising_campaign.department_name', '=', 'departments.name')
            ->get();

        return view('livewire.departments.departments-index', compact('items'));
    }
}
