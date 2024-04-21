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
        Schema::create('advertising_campaigns', function (Blueprint $table) {
            $table->string('name');
            $table->unsignedDouble('budget');
            $table->date('date');
            $table->string('target_audience');
            $table->unsignedDouble('conversion');

            $table->primary('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertising_campaigns');
    }
};
