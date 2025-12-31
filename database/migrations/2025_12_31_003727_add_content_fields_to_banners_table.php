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
        Schema::table('banners', function (Blueprint $table) {
            $table->string('badge_text')->nullable()->after('sub_title');
            $table->longText('description')->nullable()->after('badge_text');
            // Change sub_title from string to longText to support rich HTML content
            $table->longText('sub_title')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['badge_text', 'description']);
            // Revert sub_title back to string
            $table->string('sub_title')->nullable()->change();
        });
    }
};
