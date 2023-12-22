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
        Schema::create('cover_requests', function (Blueprint $table) {
            $table->id('cover_request_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'revision']);

            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('article_id')->on('articles'); // Corrected table name

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cover_requests');
    }
};
