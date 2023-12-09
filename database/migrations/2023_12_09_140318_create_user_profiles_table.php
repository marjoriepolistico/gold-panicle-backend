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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('profile_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middle_initial')->nullable();;
            $table->string('ext')->nullable();
            $table->integer('year_level');
            $table->string('course');
            $table->timestamps();
        });

        Schema::table('user_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('account_id')->on('user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};