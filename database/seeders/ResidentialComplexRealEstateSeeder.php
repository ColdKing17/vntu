<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentialComplexRealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('residential_complex_real_estate')->insert([
            [
                'residential_complex_name' => 'Зелений Оазис',
                'real_estate_address' => 'вул. Зелена, буд. 14, кв. 20, м. Дніпро'
            ],
            [
                'residential_complex_name' => 'Комфорт Парк',
                'real_estate_address' => 'просп. Незалежності, буд. 18, кв. 4, м. Луцьк'
            ],
            [
                'residential_complex_name' => 'Ексклюзивне Життя',
                'real_estate_address' => 'вул. Сонячна, буд. 10, кв. 5, м. Київ'
            ],
            [
                'residential_complex_name' => 'Сонячний Берег',
                'real_estate_address' => 'просп. Героїв, 33. Одеса'
            ],
            [
                'residential_complex_name' => 'Родинний Кут',
                'real_estate_address' => 'вул. Центральна, буд. 11Б, кв. 6, м. Запоріжжя'
            ],
            [
                'residential_complex_name' => 'Родинний Комфорт',
                'real_estate_address' => 'вул. Паркова, буд. 3, кв. 15, м. Івано-Франківськ'
            ],
        ]);
    }
}
