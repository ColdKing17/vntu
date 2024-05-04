<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentAdvertisingCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department_advertising_campaign')->insert([
            [
                'department_name' => 'Комерційний',
                'advertising_campaign_name' => '1+1=3'
            ],
            [
                'department_name' => 'Комерційний',
                'advertising_campaign_name' => 'Знижка 10 відсотків'
            ],
            [
                'department_name' => 'Юридичний',
                'advertising_campaign_name' => 'Нерухомість Легко'
            ],
            [
                'department_name' => 'Юридичний',
                'advertising_campaign_name' => '1+1=3'
            ],
            [
                'department_name' => 'Консалтинговий',
                'advertising_campaign_name' => 'Нерухомість Легко'
            ],
            [
                'department_name' => 'Консалтинговий',
                'advertising_campaign_name' => 'Знижка 10 відсотків'
            ],
        ]);
    }
}
