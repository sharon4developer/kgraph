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
        Schema::create('service_content_paragraphs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_content_title_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('service_content_title_id')->references('id')->on('service_content_titles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_content_paragraphs');
    }
};
