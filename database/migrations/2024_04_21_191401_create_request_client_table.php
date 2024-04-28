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
        Schema::create('request_client', function (Blueprint $table) {
            $table->string('client_full_name');
            $table->string('request_requirements');

            $table->primary(['request_requirements', 'client_full_name']);
            $table->foreign('request_requirements')->references('requirements')->on('requests')->cascadeOnDelete();
            $table->foreign('client_full_name')->references('full_name')->on('clients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_client');
    }
};
