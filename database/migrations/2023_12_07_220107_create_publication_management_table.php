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
        Schema::create('publication_management', function (Blueprint $table) {
            $table->id('management_id');
            $table->string('action');
            $table->string('comment');
            $table->timestamps();
        });

        Schema::table('publication_management', function (Blueprint $table) {
            $table->unsignedBigInteger('editor_id');
            $table->foreign('editor_id')->references('editor_id')->on('editorial_staffs');
            
            $table->unsignedBigInteger('cover_request_id');
            $table->foreign('cover_request_id')->references('cover_request_id')->on('cover_requests');
            
            $table->unsignedBigInteger('publication_id');
            $table->foreign('publication_id')->references('publication_id')->on('publications');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publication_management');
    }
};
