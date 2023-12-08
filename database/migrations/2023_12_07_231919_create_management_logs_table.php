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
        Schema::create('management_logs', function (Blueprint $table) {
            $table->id('mng_log_id');
            $table->string('action');
            $table->timestamps();
        });

        Schema::table('management_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('management_id');
            $table->foreign('management_id')->references('management_id')->on('publication_management');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_logs');
    }
};
