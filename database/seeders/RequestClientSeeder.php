<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('request_client')->insert([
            [
                'client_full_name' => 'Іванова Ольга Петрівна',
                'request_requirements' => 'Купити будинок за 3 000 000 грн'
            ],
            [
                'client_full_name' => 'Іванова Ольга Петрівна',
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць'
            ],
            [
                'client_full_name' => 'Сидоренко Андрій Васильович',
                'request_requirements' => 'Купити квартиру за 2 000 000 грн'
            ]
        ]);
    }
}
