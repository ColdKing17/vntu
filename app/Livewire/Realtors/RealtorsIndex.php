<?php

namespace App\Livewire\Realtors;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealtorsIndex extends Component
{
    public $department_name;
    public $service_name;

    public Collection $departments;
    public Collection $services;

    public function mount()
    {
        $this->departments = DB::table('departments')->get();
        $this->services = DB::table('services')->get();
    }

    public function delete(string $relatorFullName, string $departmentName, string $serviceName): void
    {
        DB::table('relator_department_service')
            ->where('realtor_full_name', $relatorFullName)
            ->where('department_name', $departmentName)
            ->where('service_name', $serviceName)
            ->delete();

        if (DB::table('relator_department_service')->where('realtor_full_name', $relatorFullName)->doesntExist()) {
            DB::table('realtors')->where('full_name', $relatorFullName)->delete();
        }
    }

    public function render()
    {
        $items = DB::table('realtors')
            ->join('relator_department_service', 'relator_department_service.realtor_full_name', '=', 'realtors.full_name')
            ->when($this->department_name, function ($query) {
                $query->where('department_name', $this->department_name);
            })
            ->when($this->service_name, function ($query) {
                $query->where('service_name', $this->service_name);
            })
            ->get();

        return view('livewire.realtors.realtors-index', compact('items'));
    }
}
