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
        // Check if the column exists before modifying it
        if (Schema::hasColumn('editorial_staffs', 'account_id')) {
            Schema::table('editorial_staffs', function (Blueprint $table) {
                 // Modify the existing column to be not nullable
                $table->unsignedBigInteger('account_id')->nullable(false)->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('editorial_staffs', function (Blueprint $table) {
            //
        });
    }
};
