<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealtorDepartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('relator_department_service')->insert([
            [
                'relator_full_name' => 'Кузьменко Валерій Олександрович',
                'department_name' => 'Комерційний',
                'service_name' => 'Покупка ділянки'
            ],
            [
                'relator_full_name' => 'Кузьменко Валерій Олександрович',
                'department_name' => 'Комерційний',
                'service_name' => 'Оренда будинку'
            ],
            [
                'relator_full_name' => 'Кузьменко Валерій Олександрович',
                'department_name' => 'Юридичний',
                'service_name' => 'Перевірка документів'
            ],
            [
                'relator_full_name' => 'Петренко Наталія Василівна',
                'department_name' => 'Консалтинговий',
                'service_name' => 'Підбір будинку'
            ],
            [
                'relator_full_name' => 'Петренко Наталія Василівна',
                'department_name' => 'Комерційний',
                'service_name' => 'Покупка ділянки'
            ],
            [
                'relator_full_name' => 'Петренко Наталія Василівна',
                'department_name' => 'Консалтинговий',
                'service_name' => 'Підбір квартири'
            ],
            [
                'relator_full_name' => 'Ковальчук Марія Олегівна',
                'department_name' => 'Комерційний',
                'service_name' => 'Оренда квартири'
            ],
            [
                'relator_full_name' => 'Ковальчук Марія Олегівна',
                'department_name' => 'Консалтинговий',
                'service_name' => 'Підбір квартири'
            ],
            [
                'relator_full_name' => 'Ковальчук Марія Олегівна',
                'department_name' => 'Юридичний',
                'service_name' => 'Перевірка договору'
            ],
        ]);
    }
}
