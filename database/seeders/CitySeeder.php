<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            [
                'name' => 'Львів',
                'description' => 'Історичне місто з багатою культурною спадщиною та чудовою архітектурою.',
                'area' => 182,
                'population' => 724000,
                'date_of_establishment' => '1256-01-01'
            ],
            [
                'name' => 'Харків',
                'description' => 'Велике промислове місто з багатою історією та активним культурним життям.',
                'area' => 350,
                'population' => 1436000,
                'date_of_establishment' => '1654-01-01'
            ],
            [
                'name' => 'Одеса',
                'description' => 'Морський курортний місто з живописними пляжами та великим культурним розмаїттям.',
                'area' => 236,
                'population' => 1014000,
                'date_of_establishment' => '1794-01-01'
            ],
            [
                'name' => 'Київ',
                'description' => 'Столиця України з давньою історією, численними пам\'ятками архітектури та культури.',
                'area' => 839,
                'population' => 2936000,
                'date_of_establishment' => '1482-01-01'
            ],
            [
                'name' => 'Дніпро',
                'description' => 'Місто на берегах Дніпра з розвинутою промисловістю та культурними центрами.',
                'area' => 405,
                'population' => 1021000,
                'date_of_establishment' => '1776-01-01'
            ],
        ]);
    }
}
