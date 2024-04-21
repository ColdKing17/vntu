<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealtorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('realtors')->insert([
            [
                'full_name' => 'Кузьменко Валерій Олександрович',
                'email' => 'kuzmenko@gmail.com',
                'work_experience' => 4
            ],
            [
                'full_name' => 'Петренко Наталія Василівна',
                'email' => 'petrenko@gmail.com',
                'work_experience' => 8
            ],
            [
                'full_name' => 'Ковальчук Марія Олегівна',
                'email' => 'kovalchuk@gmail.com',
                'work_experience' => 2
            ],
        ]);
    }
}
