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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('intervention_image')->nullable();
            $table->string('alt_tag')->nullable()->default('k-graph');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('resource_categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
