<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('streets')->insert([
            ['name' => 'Соборна', 'length' => 200, 'road_surface' => 'Асфальт', 'type_of_building' => 'Житловий'],
            ['name' => 'Лісова', 'length' => 300, 'road_surface' => 'Бруківка', 'type_of_building' => 'Бізнес-центр'],
            ['name' => 'Грушевського', 'length' => 150, 'road_surface' => 'Гравій', 'type_of_building' => 'Торговий'],
            ['name' => 'Шевченкова', 'length' => 400, 'road_surface' => 'Бетон', 'type_of_building' => 'Промисловий'],
            ['name' => 'Жовтнева', 'length' => 250, 'road_surface' => 'Змішане', 'type_of_building' => 'Змішаний']
        ]);
    }
}
