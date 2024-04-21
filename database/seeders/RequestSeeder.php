<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('requests')->insert([
            [
                'requirements' => 'Купити будинок за 3 000 000 грн',
                'budget' => 3000000,
                'date' => '2023-01-15',
                'property_type' => 'Будинок'
            ],
            [
                'requirements' => 'Зняти офіс в бізнес-центрі за 25 000 грн на місяць',
                'budget' => 25000,
                'date' => '2024-02-05',
                'property_type' => 'Офіс'
            ],
            [
                'requirements' => 'Купити квартиру за 2 000 000 грн',
                'budget' => 2000000,
                'date' => '2024-08-08',
                'property_type' => 'Квартира'
            ],
        ]);
    }
}
