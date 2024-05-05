<?php

namespace App\Livewire\Districts;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DistrictEdit extends Component
{
    protected $listeners = ['save' => 'create'];

    public $district;

    public function mount(string $districtName, string $cityName)
    {
        $this->district = DB::table('districts')->where('name', $districtName)->first();
        $this->district->city_name = $cityName;
    }

    public function create(array $data): void
    {
        DB::table('districts')->where('name', $this->district->name)->delete();
        DB::table('districts')->insert($data['district']);

        DB::table('district_city')
            ->insert([
                'district_name' => $data['district']['name'],
                'city_name' => $data['city_name'],
            ]);

        $this->redirectRoute('districts.index');
    }

    public function render()
    {
        return view('livewire.districts.district-edit');
    }
}
