<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_request')->insert([
            [
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць',
                'payment_date' => '2024-10-19',
                'client_full_name' => 'Іванова Ольга Петрівна'
            ],
            [
                'request_requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць',
                'payment_date' => '2024-10-19',
                'client_full_name' => 'Ковальчук Марина Ігорівна'
            ],
            [
                'request_requirements' => 'Купити квартиру за 2 000 000 грн',
                'payment_date' => '2023-04-27',
                'client_full_name' => 'Сидоренко Андрій Васильович'
            ],
            [
                'request_requirements' => 'Купити квартиру за 2 000 000 грн',
                'payment_date' => '2023-04-27',
                'client_full_name' => 'Ковальчук Марина Ігорівна'
            ]
        ]);
    }
}
