<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('real_estates')->insert([
            [
                'address' => 'вул. Зелена, буд. 14, кв. 20, м. Дніпро',
                'type' => 'Квартира',
                'price' => 500000,
                'residential_complex_name' => null,
                'district_name' => 'Шевченківський'
            ],
            [
                'address' => 'просп. Незалежності, буд. 18, кв. 4, м. Луцьк',
                'type' => 'Будинок',
                'price' => 140000,
                'residential_complex_name' => 'Комфорт Парк',
                'district_name' => 'Заводський'
            ],
            [
                'address' => 'вул. Сонячна, буд. 10, кв. 5, м. Київ',
                'type' => 'Квартира',
                'price' => 100000,
                'residential_complex_name' => 'Ексклюзивне Життя',
                'district_name' => 'Приморський'
            ],
            [
                'address' => 'просп. Героїв, 33. Одеса',
                'type' => 'Земельна ділянка',
                'price' => 40000,
                'residential_complex_name' => null,
                'district_name' => 'Печерський'
            ],
            [
                'address' => 'вул. Центральна, буд. 11Б, кв. 6, м. Запоріжжя',
                'type' => 'Офіс',
                'price' => 120000,
                'residential_complex_name' => 'Родинний Кут',
                'district_name' => 'Жовтневий'
            ],
            [
                'address' => 'вул. Паркова, буд. 3, кв. 15, м. Івано-Франківськ',
                'type' => 'Офіс',
                'price' => 700000,
                'residential_complex_name' => 'Родинний Комфорт',
                'district_name' => 'Київський'
            ],
        ]);
    }
}
