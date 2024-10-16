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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('about_title')->nullable();
            $table->string('about_sub_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_image_alt_tag')->nullable();
            $table->string('crew_title')->nullable();
            $table->string('journey_title')->nullable();
            $table->string('journey_sub_title')->nullable();
            $table->text('journey_description')->nullable();
            $table->string('journey_image')->nullable();
            $table->string('journey_image_alt_tag')->nullable();
            $table->string('our_story_title')->nullable();
            $table->string('location_title')->nullable();
            $table->string('location_sub_title')->nullable();
            $table->string('location_image1')->nullable();
            $table->string('location_image2')->nullable();
            $table->string('location_image3')->nullable();
            $table->string('location_image1_alt_tag')->nullable();
            $table->string('location_image2_alt_tag')->nullable();
            $table->string('location_image3_alt_tag')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
