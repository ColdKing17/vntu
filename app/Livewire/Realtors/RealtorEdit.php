<?php

namespace App\Livewire\Realtors;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealtorEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $realtor;

    public function mount(string $relatorFullName, string $departmentName, string $serviceName)
    {
        $this->realtor = DB::table('realtors')->where('full_name', $relatorFullName)->first();
        $this->realtor->department_name = $departmentName;
        $this->realtor->service_name = $serviceName;
    }

    public function create(array $data): void
    {
        DB::table('realtors')->where('full_name', $this->realtor->full_name)->delete();
        DB::table('realtors')->where('full_name', $this->realtor->full_name)->insert($data['realtor']);

        DB::table('relator_department_service')
            ->where('realtor_full_name', $this->realtor->full_name)
            ->where('department_name', $this->realtor->department_name)
            ->where('service_name', $this->realtor->service_name)
            ->insert([
                'realtor_full_name' => $data['realtor']['full_name'],
                'department_name' => $data['department_name'],
                'service_name' => $data['service_name'],
            ]);

        $this->redirectRoute('realtors.index');
    }

    public function render()
    {
        return view('livewire.realtors.realtor-edit');
    }
}
