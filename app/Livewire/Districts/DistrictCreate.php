<?php

namespace App\Livewire\Districts;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DistrictCreate extends Component
{
    protected $listeners = ['save' => 'create'];

    public function create(array $data): void
    {
        DB::table('districts')->insert($data['district']);
        DB::table('district_city')->insert([
            'district_name' => $data['district']['name'],
            'city_name' => $data['city_name'],
        ]);

        $this->redirectRoute('districts.index');
    }

    public function render()
    {
        return view('livewire.districts.district-create');
    }
}
