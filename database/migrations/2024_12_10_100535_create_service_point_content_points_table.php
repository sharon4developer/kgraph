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
        Schema::create('service_point_content_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_point_content_id')->nullable();
            $table->foreign('service_point_content_id')->references('id')->on('sub_service_point_contents')->onDelete('CASCADE');;
            $table->string('option')->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_point_content_points');
    }
};
