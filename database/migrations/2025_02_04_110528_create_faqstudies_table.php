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
        Schema::create('faqstudies', function (Blueprint $table) {
            $table->id();
            $table->text('faq_question')->nullable();
            $table->text('faq_answer')->nullable();
            $table->unsignedBigInteger('study_id');
            $table->timestamps();
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqstudies');
    }
};
