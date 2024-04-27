<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestRealtorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('request_realtor')->insert([
            [
                'realtor_full_name' => 'Кузьменко Валерій Олександрович',
                'request_requirements' => 'Купити будинок за 3 000 000 грн'
            ],
            [
                'realtor_full_name' => 'Петренко Наталія Василівна',
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць'
            ],
            [
                'realtor_full_name' => 'Ковальчук Марія Олегівна',
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць'
            ],
            [
                'realtor_full_name' => 'Кузьменко Валерій Олександрович',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ],
            [
                'realtor_full_name' => 'Ковальчук Марія Олегівна',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ],
            [
                'realtor_full_name' => 'Петренко Наталія Василівна',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ],
        ]);
    }
}
