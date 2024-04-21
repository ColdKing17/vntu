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
        Schema::create('department_advertising_campaign', function (Blueprint $table) {
            $table->string('department_name');
            $table->string('advertising_campaign_name');

            $table->primary(['advertising_campaign_name', 'department_name']);
            $table->foreign('advertising_campaign_name', 'advertising_campaign_name')->references('name')->on('advertising_campaigns');
            $table->foreign('department_name')->references('name')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_advertising_campaigns');
    }
};
