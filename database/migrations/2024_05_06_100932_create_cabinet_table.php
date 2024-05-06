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
        Schema::create('cabinet', function (Blueprint $table) {
            $table->unsignedInteger('number');
            $table->unsignedInteger('workers_amount');
            $table->unsignedInteger('floor');
            $table->unsignedInteger('square');
            $table->boolean('fax');
            $table->primary('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabinet');
    }
};
