<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('district_city')->insert([
            [
                'district_name' => 'Шевченківський',
                'city_name' => 'Київ'
            ],
            [
                'district_name' => 'Заводський',
                'city_name' => 'Львів'
            ],
            [
                'district_name' => 'Приморський',
                'city_name' => 'Одеса'
            ],
            [
                'district_name' => 'Печерський',
                'city_name' => 'Київ'
            ],
            [
                'district_name' => 'Жовтневий',
                'city_name' => 'Харків'
            ],
            [
                'district_name' => 'Київський',
                'city_name' => 'Київ'
            ],
            [
                'district_name' => 'Індустріальний',
                'city_name' => 'Одеса'
            ],
            [
                'district_name' => 'Центральний',
                'city_name' => 'Львів'
            ],
        ]);
    }
}
