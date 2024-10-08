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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->text('topics')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('alt_tag')->nullable()->default('k-graph');
            $table->string('intervention_image')->nullable();
            $table->string('user_image')->nullable();
            $table->string('user_intervention_image')->nullable();
            $table->string('user_alt_tag')->nullable()->default('k-graph');
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
        Schema::dropIfExists('blogs');
    }
};
