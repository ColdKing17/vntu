<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'full_name' => 'Іванова Ольга Петрівна',
                'phone_number' => '+380987654321',
                'date_of_birth' => '1985-04-15',
                'city_name' => 'Київ'
            ],
            [
                'full_name' => 'Сидоренко Андрій Васильович',
                'phone_number' => '+380998877665',
                'date_of_birth' => '1990-09-25',
                'city_name' => 'Харків'
            ],
            [
                'full_name' => 'Ковальчук Марина Ігорівна',
                'phone_number' => '+380956473829',
                'date_of_birth' => '1978-12-05',
                'city_name' => 'Львів'
            ],
        ]);
    }
}
