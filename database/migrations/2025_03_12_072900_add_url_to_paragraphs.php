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
        Schema::table('paragraphs', function (Blueprint $table) {
            $table->string('url')->after('content')->nullable();
        });

        Schema::table('service_content_paragraphs', function (Blueprint $table) {
            $table->string('url')->after('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paragraphs', function (Blueprint $table) {
            $table->dropColumn('url');
        });

        Schema::table('service_content_paragraphs', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
};
