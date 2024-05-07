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
            $table->string('type');
            $table->unsignedDouble('price');
            $table->string('residential_complex_name')->nullable();
            $table->string('district_name');

            $table->primary(['address', 'type']);
            $table->foreign('residential_complex_name')->references('name')->on('residential_complexes')->nullOnDelete();
            $table->foreign('district_name')->references('name')->on('districts')->cascadeOnUpdate()->cascadeOnDelete();
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
