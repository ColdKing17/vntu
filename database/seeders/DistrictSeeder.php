<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            [
                'name' => 'Шевченківський',
                'description' => 'Житловий район з хорошою інфраструктурою та зеленими зонами.',
                'rating' => 8.33,
                'area' => 2500
            ],
            [
                'name' => 'Заводський',
                'description' => 'Промисловий район з численними заводами та підприємствами.',
                'rating' => 7.95,
                'area' => 1800
            ],
            [
                'name' => 'Приморський',
                'description' => 'Район, розташований біля моря або водойми, з прекрасними пляжами та туристичною інфраструктурою.',
                'rating' => 9.18,
                'area' => 3200
            ],
            [
                'name' => 'Печерський',
                'description' => 'Центральний район міста з багатою історією та культурними пам\'ятками.',
                'rating' => 6.72,
                'area' => 1500
            ],
            [
                'name' => 'Жовтневий',
                'description' => 'Типовий спальний район з численними житловими будинками і парками.',
                'rating' => 8.57,
                'area' => 2000
            ],
            [
                'name' => 'Київський',
                'description' => 'Район, названий на честь столиці, зі збереженою історичною архітектурою та атмосферою.',
                'rating' => 9.02,
                'area' => 2800
            ],
            [
                'name' => 'Індустріальний',
                'description' => 'Область з великою кількістю промислових підприємств та фабрик.',
                'rating' => 7.29,
                'area' => 2100
            ],
            [
                'name' => 'Центральний',
                'description' => 'Серце міста з великою кількістю магазинів, ресторанів та культурних закладів.',
                'rating' => 8.93,
                'area' => 1900
            ],
        ]);
    }
}
