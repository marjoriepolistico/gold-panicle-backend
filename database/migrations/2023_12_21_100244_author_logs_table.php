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
        Schema::create('author_logs', function (Blueprint $table) {
            $table->id('auth_log_id');
            $table->enum('action', ['create',  'edit', 'delete']);

            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('article_id')->on('articles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
