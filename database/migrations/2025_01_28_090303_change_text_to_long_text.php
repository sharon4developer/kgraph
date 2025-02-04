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
        Schema::table('career_contents', function (Blueprint $table) {
            $table->longText('description')->change();
        });

        Schema::table('careers', function (Blueprint $table) {
            $table->longText('description')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('career_contents', function (Blueprint $table) {
            $table->longText('description');
        });

        Schema::table('careers', function (Blueprint $table) {
            $table->longText('description');
        });
    }
};
