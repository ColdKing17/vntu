<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('district_city', function (Blueprint $table) {
            $table->string('district_name');
            $table->string('city_name');

            $table->primary(['city_name', 'district_name']);
            $table->foreign('city_name')->references('name')->on('cities');
            $table->foreign('district_name')->references('name')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_city');
    }
};
