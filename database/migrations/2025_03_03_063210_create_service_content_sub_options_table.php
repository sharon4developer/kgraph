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
        Schema::create('service_content_sub_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_content_options_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('service_content_options_id')->references('id')->on('service_content_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_content_sub_options');
    }
};
