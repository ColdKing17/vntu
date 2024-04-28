<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StreetSeeder::class,
            CitySeeder::class,
            BuilderSeeder::class,
            AdvertisingCampaignSeeder::class,
            ServiceSeeder::class,
            ClientSeeder::class,
            RequestSeeder::class,
            RealtorSeeder::class,
            DepartmentOfficeSeeder::class,
            DepartmentSeeder::class,
            DistrictSeeder::class,
            ResidentialComplexSeeder::class,
            RealEstateSeeder::class,
            PaymentSeeder::class,
            RequestClientSeeder::class,
            RequestRealtorSeeder::class,
            DepartmentAdvertisingCampaignSeeder::class,
            DistrictCitySeeder::class,
            RealtorDepartmentServiceSeeder::class,
            PaymentRequestSeeder::class,
        ]);
    }
}
