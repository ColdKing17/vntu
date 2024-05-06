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
        Schema::create('mall', function (Blueprint $table) {
            $table->string('address');
            $table->string('name');
            $table->unsignedInteger('square');
            $table->unsignedInteger('superficiality');
            $table->primary('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mall');
    }
};
