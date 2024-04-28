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
                'address' => 'вул. Зелена, буд. 14, кв. 20, м. Дніпро',
                'builder_name' => 'Аркадія-Буд',
                'number_of_floors' => 5
            ],
            [
                'name' => 'Комфорт Парк',
                'description' => 'Сучасний житловий комплекс зі зручною інфраструктурою та розвиненою територією відпочинку.',
                'address' => 'просп. Незалежності, буд. 18, кв. 4, м. Луцьк',
                'builder_name' => 'Інноваційне Будівництво',
                'number_of_floors' => 12
            ],
            [
                'name' => 'Ексклюзивне Життя',
                'description' => 'Вишуканий ЖК з високими стандартами життя та унікальним дизайном.',
                'address' => 'вул. Сонячна, буд. 10, кв. 5, м. Київ',
                'builder_name' => 'Комфортний Житлобуд',
                'number_of_floors' => 8
            ],
            [
                'name' => 'Сонячний Берег',
                'description' => 'Привабливий ЖК з великими вікнами та панорамним видом на місто чи природні ландшафти.',
                'address' => 'просп. Героїв, 33. Одеса',
                'builder_name' => 'Інноваційне Будівництво',
                'number_of_floors' => 15
            ],
            [
                'name' => 'Родинний Кут',
                'description' => 'Комплекс, створений для комфортного життя сімей, з дитячими майданчиками та ігровими зонами.',
                'address' => 'вул. Центральна, буд. 11Б, кв. 6, м. Запоріжжя',
                'builder_name' => 'Комфортний Житлобуд',
                'number_of_floors' => 20
            ],
            [
                'name' => 'Родинний Комфорт',
                'description' => 'ЖК, де кожен дім - це затишне місце для вашої родини зі зручною плануванням та усіма необхідними зручностями.',
                'address' => 'вул. Паркова, буд. 3, кв. 15, м. Івано-Франківськ',
                'builder_name' => 'Інноваційне Будівництво',
                'number_of_floors' => 10
            ],
        ]);
    }
}
