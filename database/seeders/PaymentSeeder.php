<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'amount' => 50000,
                'date' => '2024-10-19',
                'payment_method' => 'Готівка',
                'client_full_name' => 'Іванова Ольга Петрівна',
                'real_estate_address' => 'вул. Зелена, буд. 14, кв. 20, м. Дніпро'
            ],
            [
                'amount' => 50000,
                'date' => '2024-10-19',
                'payment_method' => 'Готівка',
                'client_full_name' => 'Ковальчук Марина Ігорівна',
                'real_estate_address' => 'вул. Зелена, буд. 14, кв. 20, м. Дніпро'
            ],
            [
                'amount' => 500000,
                'date' => '2024-02-05',
                'payment_method' => 'Mastercard',
                'client_full_name' => 'Іванова Ольга Петрівна',
                'real_estate_address' => 'просп. Незалежності, буд. 18, кв. 4, м. Луцьк'
            ],
            [
                'amount' => 500000,
                'date' => '2024-02-05',
                'payment_method' => 'Mastercard',
                'client_full_name' => 'Ковальчук Марина Ігорівна',
                'real_estate_address' => 'просп. Незалежності, буд. 18, кв. 4, м. Луцьк'
            ],
            [
                'amount' => 20000,
                'date' => '2023-04-27',
                'payment_method' => 'PayPal',
                'client_full_name' => 'Ковальчук Марина Ігорівна',
                'real_estate_address' => 'вул. Сонячна, буд. 10, кв. 5, м. Київ'
            ],
            [
                'amount' => 20000,
                'date' => '2023-04-27',
                'payment_method' => 'PayPal',
                'client_full_name' => 'Сидоренко Андрій Васильович',
                'real_estate_address' => 'вул. Сонячна, буд. 10, кв. 5, м. Київ'
            ],
        ]);
    }
}
