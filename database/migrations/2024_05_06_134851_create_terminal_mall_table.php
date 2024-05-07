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
        Schema::create('terminal_mall', function (Blueprint $table) {
            $table->unsignedInteger('terminal_internal_number');
            $table->string('mall_address');

            $table->primary(['terminal_internal_number', 'mall_address']);

            $table->foreign('terminal_internal_number')->references('internal_number')->on('terminals')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('mall_address')->references('address')->on('malls')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminal_mall');
    }
};
