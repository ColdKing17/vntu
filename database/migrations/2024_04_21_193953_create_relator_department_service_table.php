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
        Schema::create('relator_department_service', function (Blueprint $table) {
            $table->string('relator_full_name');
            $table->string('department_name');
            $table->string('service_name');

            $table->primary(['relator_full_name', 'department_name', 'service_name']);
            $table->foreign('relator_full_name')->references('full_name')->on('realtors')->cascadeOnDelete();
            $table->foreign('department_name')->references('name')->on('departments')->cascadeOnDelete();
            $table->foreign('service_name')->references('name')->on('services')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relator_department_service');
    }
};
