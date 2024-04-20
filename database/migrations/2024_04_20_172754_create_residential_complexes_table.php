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
        Schema::create('residential_complexes', function (Blueprint $table) {
            $table->string('name');
            $table->text('description');
            $table->string('builder_name');
            $table->unsignedInteger('number_of_floors');

            $table->primary('name');
            $table->foreign('builder_name')->references('name')->on('builders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residential_complexes');
    }
};
