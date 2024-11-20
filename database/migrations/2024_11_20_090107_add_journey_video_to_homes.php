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
        Schema::table('homes', function (Blueprint $table) {
            $table->string('journey_video')->nullable()->after('journey_image3');
            $table->string('journey_video_name')->nullable()->after('journey_image3');
            $table->string('journey_video_position')->nullable()->after('journey_image3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('journey_video');
            $table->dropColumn('journey_video_name');
            $table->dropColumn('journey_video_position');
        });
    }
};
