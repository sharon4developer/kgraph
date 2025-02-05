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
        Schema::create('studies', function (Blueprint $table) {
        // Making all fields nullable
        $table->id();
            $table->string('study_banner_image')->nullable();
            $table->string('study_banner_title')->nullable();
            $table->string('sub_content_title')->nullable();
            $table->text('sub_content_description')->nullable();
            $table->string('sub_image')->nullable();
            $table->string('package_title');
            $table->string('package_description')->nullable();
            $table->timestamps();
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
