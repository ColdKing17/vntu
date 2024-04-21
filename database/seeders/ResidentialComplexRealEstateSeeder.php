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
                'real_estate_address' => 'вул. Першотравнева, 10, Київ'
            ],
            [
                'residential_complex_name' => 'Комфорт Парк',
                'real_estate_address' => 'просп. Соборний, 25А, Харків'
            ],
            [
                'residential_complex_name' => 'Ексклюзивне Життя',
                'real_estate_address' => 'вул. Шевченка, 7, Львів'
            ],
            [
                'residential_complex_name' => 'Сонячний Берег',
                'real_estate_address' => 'вул. Паркова, 33, Одеса'
            ],
            [
                'residential_complex_name' => 'Родинний Кут',
                'real_estate_address' => 'вул. Центральна, 15, Дніпро'
            ],
            [
                'residential_complex_name' => 'Родинний Комфорт',
                'real_estate_address' => 'вул. Гагаріна, 55, Запоріжжя'
            ],
        ]);
    }
}
