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
        Schema::table('eligibility_checks', function (Blueprint $table) {
            $table->string('language_test')->nullable();
            $table->string('speaking')->nullable();
            $table->string('reading')->nullable();
            $table->string('listening')->nullable();
            $table->string('writing')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eligibility_checks', function (Blueprint $table) {
            $table->dropColumn('language_test');
            $table->dropColumn('speaking');
            $table->dropColumn('reading');
            $table->dropColumn('listening');
            $table->dropColumn('writing');
        });
    }
};
