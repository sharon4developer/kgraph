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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();

            // Services section
            $table->string('service_first_title')->nullable();
            $table->string('service_second_title')->nullable();
            $table->string('service_sub_title')->nullable();
            $table->text('service_description')->nullable();

            // Who we are section
            $table->string('who_we_are_first_title')->nullable();
            $table->string('who_we_are_second_title')->nullable();
            $table->string('who_we_are_sub_title')->nullable();

            // Journey section
            $table->string('journey_title')->nullable();
            $table->text('journey_description')->nullable();
            $table->string('journey_image1')->nullable();
            $table->string('journey_image2')->nullable();
            $table->string('journey_image3')->nullable();
            $table->string('journey_image1_alt_tag')->nullable();
            $table->string('journey_image2_alt_tag')->nullable();
            $table->string('journey_image3_alt_tag')->nullable();

            // Certificate section
            $table->string('certificate_title')->nullable();
            $table->text('certificate_description')->nullable();
            $table->string('certificate_image1')->nullable();
            $table->string('certificate_image2')->nullable();
            $table->string('certificate_image3')->nullable();
            $table->string('certificate_image1_alt_tag')->nullable();
            $table->string('certificate_image2_alt_tag')->nullable();
            $table->string('certificate_image3_alt_tag')->nullable();

            // Testimonial section
            $table->string('testimonial_title')->nullable();
            $table->string('testimonial_sub_title')->nullable();
            $table->text('testimonial_description')->nullable();

            // Blog section
            $table->string('blog_title')->nullable();
            $table->string('blog_sub_title')->nullable();
            $table->text('blog_description')->nullable();

            // Explore section
            $table->string('explore_title')->nullable();
            $table->string('explore_sub_title')->nullable();

            // FAQ section
            $table->string('faq_title')->nullable();
            $table->string('faq_sub_title')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
