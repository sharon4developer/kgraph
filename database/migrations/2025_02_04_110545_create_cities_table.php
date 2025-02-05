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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('cities_title')->nullable();
            $table->string('cities_list_image')->nullable();
            $table->string('cities_list_place')->nullable();
            $table->unsignedBigInteger('study_id'); // Foreign key
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
