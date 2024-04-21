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
        Schema::create('residential_complex_real_estate', function (Blueprint $table) {
            $table->string('residential_complex_name');
            $table->string('real_estate_address');

            $table->primary(['residential_complex_name', 'real_estate_address']);
            $table->foreign('residential_complex_name')->references('name')->on('residential_complexes');
            $table->foreign('real_estate_address')->references('address')->on('real_estates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residential_complex_real_estate');
    }
};
