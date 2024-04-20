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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->string('address');
            $table->unsignedFloat('price');
            $table->string('residential_complex_name');
            $table->string('district_name');

            $table->primary('address');
            $table->foreign('residential_complex_name')->references('name')->on('residential_complexes');
            $table->foreign('district_name')->references('name')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
