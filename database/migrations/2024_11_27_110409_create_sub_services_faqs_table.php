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
        Schema::create('sub_services_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_service_id')->nullable();
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->onDelete('CASCADE');;
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->default(1)->nullable();
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
        Schema::dropIfExists('sub_services_faqs');
    }
};
