<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentialComplexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('residential_complexes')->insert([
            [
                'name' => 'Зелений Оазис',
                'description' => 'ЖК, оточений зеленими насадженнями та парками, ідеальне місце для тих, хто цінує спокій та екологічну чистоту.',
                'builder_name' => 'Аркадія-Буд',
                'number_of_floors' => 5
            ],
            [
                'name' => 'Комфорт Парк',
                'description' => 'Сучасний житловий комплекс зі зручною інфраструктурою та розвиненою територією відпочинку.',
                'builder_name' => 'Інноваційне Будівництво',
                'number_of_floors' => 12
            ],
            [
                'name' => 'Ексклюзивне Життя',
                'description' => 'Вишуканий ЖК з високими стандартами життя та унікальним дизайном.',
                'builder_name' => 'Комфортний Житлобуд',
                'number_of_floors' => 8
            ],
            [
                'name' => 'Сонячний Берег',
                'description' => 'Привабливий ЖК з великими вікнами та панорамним видом на місто чи природні ландшафти.',
                'builder_name' => 'Інноваційне Будівництво',
                'number_of_floors' => 15
            ],
            [
                'name' => 'Родинний Кут',
                'description' => 'Комплекс, створений для комфортного життя сімей, з дитячими майданчиками та ігровими зонами.',
                'builder_name' => 'Комфортний Житлобуд',
                'number_of_floors' => 20
            ],
            [
                'name' => 'Родинний Комфорт',
                'description' => 'ЖК, де кожен дім - це затишне місце для вашої родини зі зручною плануванням та усіма необхідними зручностями.',
                'builder_name' => 'Інноваційне Будівництво',
                'number_of_floors' => 10
            ],
        ]);
    }
}
