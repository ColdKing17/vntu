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
                'realtor_full_name' => 'Кузьменко Валерій Олександрович',
                'department_name' => 'Комерційний',
                'service_name' => 'Знайти квартиру в аренду'
            ],
            [
                'realtor_full_name' => 'Кузьменко Валерій Олександрович',
                'department_name' => 'Комерційний',
                'service_name' => 'Попомогти купити земельну ділянку'
            ],
            [
                'realtor_full_name' => 'Кузьменко Валерій Олександрович',
                'department_name' => 'Юридичний',
                'service_name' => 'Перевірка документів'
            ],
            [
                'realtor_full_name' => 'Петренко Наталія Василівна',
                'department_name' => 'Консалтинговий',
                'service_name' => 'Юридична допомога при покупці нерухомості'
            ],
            [
                'realtor_full_name' => 'Петренко Наталія Василівна',
                'department_name' => 'Комерційний',
                'service_name' => 'Знайти квартиру в аренду'
            ],
            [
                'realtor_full_name' => 'Петренко Наталія Василівна',
                'department_name' => 'Консалтинговий',
                'service_name' => 'Попомогти купити земельну ділянку'
            ],
            [
                'realtor_full_name' => 'Ковальчук Марія Олегівна',
                'department_name' => 'Комерційний',
                'service_name' => 'Перевірка документів'
            ],
            [
                'realtor_full_name' => 'Ковальчук Марія Олегівна',
                'department_name' => 'Консалтинговий',
                'service_name' => 'Юридична допомога при покупці нерухомості'
            ],
            [
                'realtor_full_name' => 'Ковальчук Марія Олегівна',
                'department_name' => 'Юридичний',
                'service_name' => 'Перевірка документів'
            ],
        ]);
    }
}
