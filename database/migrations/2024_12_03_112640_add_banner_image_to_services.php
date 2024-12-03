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
        Schema::table('services', function (Blueprint $table) {
            $table->string('banner_image')->nullable()->after('image');
            $table->string('banner_image_alt_tag')->nullable()->after('banner_image');
        });

        Schema::table('sub_services', function (Blueprint $table) {
            $table->string('banner_image')->nullable()->after('image');
            $table->string('banner_image_alt_tag')->nullable()->after('banner_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('banner_image');
            $table->dropColumn('banner_image_alt_tag');
        });
    }
};
