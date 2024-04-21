<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('builders')->insert([
            [
                'name' => 'Аркадія-Буд',
                'email' => 'arkadia@gmail.com',
                'experience' => 20,
                'phone_number' => '+380994567890'
            ],
            [
                'name' => 'Інноваційне Будівництво',
                'email' => 'innovation@gmail.com',
                'experience' => 14,
                'phone_number' => '+380982345678'
            ],
            [
                'name' => 'Комфортний Житлобуд',
                'email' => 'comfort@gmail.com',
                'experience' => 9,
                'phone_number' => '+380987654321'
            ],
            [
                'name' => 'Успішне Житлове Будівництво',
                'email' => 'success@gmail.com',
                'experience' => 22,
                'phone_number' => '+380995432109'
            ],
            [
                'name' => 'Елітне Житлове Об\'єднання',
                'email' => 'elit@gmail.com',
                'experience' => 3,
                'phone_number' => '+380996543210'
            ],
            [
                'name' => 'Лідерське Будівництво',
                'email' => 'lider@gmail.com',
                'experience' => 11,
                'phone_number' => '+380989876543'
            ],
        ]);
    }
}
