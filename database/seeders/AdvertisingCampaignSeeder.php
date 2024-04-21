<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisingCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('advertising_campaigns')->insert([
            [
                'name' => '1+1=3',
                'budget' => 15000,
                'date' => '2023-01-15',
                'target_audience' => "Молоді сім'ї",
                'conversion' => 0.18
            ],
            [
                'name' => 'Знижка 10%',
                'budget' => 3000,
                'date' => '2023-04-22',
                'target_audience' => 'Студенти та молодь',
                'conversion' => 0.23
            ],
            [
                'name' => 'Нерухомість Легко',
                'budget' => 20000,
                'date' => '2023-07-05',
                'target_audience' => 'Жінки віком 25-40 років',
                'conversion' => 0.29
            ],
            [
                'name' => 'Вікна у Майбутнє',
                'budget' => 10000,
                'date' => '2023-09-11',
                'target_audience' => 'Професіонали IT-сфери',
                'conversion' => 0.14
            ],
            [
                'name' => 'Безкоштовна консультація',
                'budget' => 3000,
                'date' => '2023-11-29',
                'target_audience' => 'Підприємці та бізнесмени',
                'conversion' => 0.27
            ],
        ]);

    }
}
