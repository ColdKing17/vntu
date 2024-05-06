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
            $table->string('mall_address');

            $table->primary(['internal_number', 'mall_address']);

            $table->foreign('internal_number')->references('internal_number')->on('terminals')->cascadeOnDelete();
            $table->foreign('mall_address')->references('address')->on('mall')->cascadeOnDelete();
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
