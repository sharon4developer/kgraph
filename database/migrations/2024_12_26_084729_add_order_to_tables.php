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
        Schema::table('applied_careers', function (Blueprint $table) {
            $table->integer('order')->nullable()->default(0)->after('resume');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('order')->nullable()->default(0)->after('message');
        });

        Schema::table('eligibility_checks', function (Blueprint $table) {
            $table->integer('order')->nullable()->default(0)->after('writing');
        });

        Schema::table('news_letters', function (Blueprint $table) {
            $table->integer('order')->nullable()->default(0)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applied_careers', function (Blueprint $table) {
            $table->dropColumn('order');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('order');
        });

        Schema::table('eligibility_checks', function (Blueprint $table) {
            $table->dropColumn('order');
        });

        Schema::table('news_letters', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
