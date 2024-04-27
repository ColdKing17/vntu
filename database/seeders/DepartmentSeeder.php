<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'name' => 'Комерційний',
                'office_address' => 'вул. Лісова, буд. 10, кв. 5, м. Київ',
                'phone_number' => '+380991234567'
            ],
            [
                'name' => 'Юридичний',
                'office_address' => 'вул. Грушевського, буд. 7, кв. 12, м. Харків',
                'phone_number' => '+380994567890'
            ],
            [
                'name' => 'Консалтинговий',
                'office_address' => 'вул. Жовтнева, буд. 5, кв. 9, м. Чернівці',
                'phone_number' => '+380982345678'
            ],
        ]);
    }
}
