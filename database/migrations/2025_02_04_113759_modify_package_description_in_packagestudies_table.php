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
        Schema::table('packagestudies', function (Blueprint $table) {
            $table->text('package_description')->default('')->change(); // Default value as an empty string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packagestudies', function (Blueprint $table) {
            //
        });
    }
};
