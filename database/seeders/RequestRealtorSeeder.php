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
                'realtor_full_name' => 'Ковальова Вікторія Миколаївна',
                'request_requirements' => 'Купити будинок за 3 000 000 грн'
            ],
            [
                'realtor_full_name' => 'Лисенко Олексій Іванович',
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць'
            ],
            [
                'realtor_full_name' => 'Лисенко Олексій Іванович',
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць'
            ],
            [
                'realtor_full_name' => 'Ковальова Вікторія Миколаївна',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ],
            [
                'realtor_full_name' => 'Іванова Олена Вікторівна',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ],
            [
                'realtor_full_name' => 'Лисенко Олексій Іванович',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ],
        ]);
    }
}
