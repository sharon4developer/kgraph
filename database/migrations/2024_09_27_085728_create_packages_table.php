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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('country')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('intervention_image')->nullable();
            $table->string('alt_tag')->nullable()->default('k-graph');
            $table->integer('status')->default(1)->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
