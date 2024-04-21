<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Знайти квартиру в аренду',
                'description' => 'Знаходимо найкращі квартири для оренди вам.',
                'price' => 4000,
                'term_of_provision' => '14'
            ],
            [
                'name' => 'Попомогти купити земельну ділянку',
                'description' => 'Допомагаємо вам купити земельну ділянку за вигідною ціною.',
                'price' => 10000,
                'term_of_provision' => '20'
            ],
            [
                'name' => 'Юридична допомога при покупці нерухомості',
                'description' => 'Надаємо юридичну підтримку при купівлі нерухомості.',
                'price' => 20000,
                'term_of_provision' => '7'
            ],
            [
                'name' => 'Перевірка документів',
                'description' => 'Проводимо перевірку всіх документів перед укладенням угоди.',
                'price' => 1000,
                'term_of_provision' => '3'
            ],
        ]);
    }
}
