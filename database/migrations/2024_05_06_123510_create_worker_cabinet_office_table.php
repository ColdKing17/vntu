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
        Schema::create('worker_cabinet_office', function (Blueprint $table) {
            $table->string('worker_full_name');
            $table->unsignedInteger('cabinet_number');
            $table->string('office_address');

            $table->primary(['worker_full_name', 'cabinet_number', 'office_address']);

            $table->foreign('worker_full_name')->references('full_name')->on('workers');
            $table->foreign('cabinet_number')->references('number')->on('cabinets');
            $table->foreign('office_address')->references('address')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_cabinet_office');
    }
};
