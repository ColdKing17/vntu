<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department_offices')->insert([
            [
                'address' => 'вул. Лісова, буд. 10, кв. 5, м. Київ',
                'street_name' => 'Лісова'
            ],
            [
                'address' => 'вул. Садова, буд. 7, кв. 12, м. Харків',
                'street_name' => 'Садова'
            ],
            [
                'address' => 'вул. Центральна, буд. 5, кв. 9, м. Чернівці',
                'street_name' => 'Центральна'
            ],
        ]);
    }
}
