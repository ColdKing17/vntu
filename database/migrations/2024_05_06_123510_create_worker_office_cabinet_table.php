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
        Schema::create('worker_office_cabinet', function (Blueprint $table) {
            $table->string('worker_fullname');
            $table->unsignedInteger('worker_cabinet');
            $table->string('worker_office');

            $table->primary(['worker_fullname', 'worker_cabinet', 'worker_office']);

            $table->foreign('worker_fullname')->references('fullname')->on('workers');
            $table->foreign('worker_cabinet')->references('number')->on('cabinet');
            $table->foreign('worker_office')->references('address')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_office_cabinet');
    }
};
