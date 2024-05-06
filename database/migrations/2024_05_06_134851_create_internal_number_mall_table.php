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
        Schema::create('internal_number_mall', function (Blueprint $table) {
            $table->unsignedInteger('internal_number');
            $table->string('mall_name');

            $table->primary(['internal_number', 'mall_name']);

            $table->foreign('internal_number')->references('internal_number')->on('terminals');
            $table->foreign('mall_name')->references('name')->on('mall');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_number_mall');
    }
};
